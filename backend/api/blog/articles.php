
<?php
require_once '../config/database.php';

// Rate limiting semplice (da migliorare con Redis in produzione)
$client_ip = $_SERVER['REMOTE_ADDR'];
$rate_limit_file = sys_get_temp_dir() . '/rate_limit_' . md5($client_ip);
$current_time = time();
$rate_limit = 60; // richieste per minuto

if (file_exists($rate_limit_file)) {
    $last_request = filemtime($rate_limit_file);
    if (($current_time - $last_request) < 1) {
        http_response_code(429);
        echo json_encode(['error' => 'Rate limit exceeded']);
        exit;
    }
}
touch($rate_limit_file);

try {
    // Query sicura con prepared statement
    $sql = "SELECT a.id, a.title, a.slug, a.excerpt, a.author, a.image, a.published, a.featured, 
                   a.tags, a.views, a.read_time, a.created_at, a.updated_at,
                   c.name as category, c.slug as category_slug, c.color as category_color 
            FROM blog_articles a 
            LEFT JOIN blog_categories c ON a.category_id = c.id 
            WHERE a.published = 1 
            ORDER BY a.created_at DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll();
    
    // Processa i dati in modo sicuro
    foreach($articles as &$article) {
        $article['tags'] = json_decode($article['tags'] ?? '[]', true) ?: [];
        $article['date'] = date('d M Y', strtotime($article['created_at']));
        $article['views'] = (int)$article['views'];
        
        // Rimuovi campi sensibili se necessario
        unset($article['updated_at']);
    }
    
    echo json_encode($articles);
    
} catch(PDOException $e) {
    error_log('Database error in articles.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch articles']);
}
?>

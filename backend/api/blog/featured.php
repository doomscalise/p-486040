
<?php
require_once '../config/database.php';

try {
    $sql = "SELECT a.*, c.name as category, c.slug as category_slug, c.color as category_color 
            FROM blog_articles a 
            LEFT JOIN blog_categories c ON a.category_id = c.id 
            WHERE a.published = 1 AND a.featured = 1 
            ORDER BY a.created_at DESC";
    
    $stmt = $pdo->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Converti i tag da JSON a array
    foreach($articles as &$article) {
        $article['tags'] = json_decode($article['tags'] ?? '[]');
        $article['date'] = date('d M Y', strtotime($article['created_at']));
    }
    
    echo json_encode($articles);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch featured articles']);
}
?>


<?php
require_once '../../../config/database.php';

$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
    http_response_code(400);
    echo json_encode(['error' => 'Article slug required']);
    exit;
}

try {
    $sql = "SELECT a.*, c.name as category, c.slug as category_slug, c.color as category_color 
            FROM blog_articles a 
            LEFT JOIN blog_categories c ON a.category_id = c.id 
            WHERE a.slug = ? AND a.published = 1";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$slug]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($article) {
        $article['tags'] = json_decode($article['tags'] ?? '[]');
        $article['date'] = date('d M Y', strtotime($article['created_at']));
        echo json_encode($article);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Article not found']);
    }
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch article']);
}
?>


<?php
require_once '../../../config/database.php';

$slug = validateInput($_GET['slug'] ?? '', 'slug');

if (!$slug) {
    http_response_code(400);
    echo json_encode(['error' => 'Valid article slug required']);
    exit;
}

try {
    $sql = "SELECT a.id, a.title, a.slug, a.excerpt, a.content, a.author, a.image, 
                   a.published, a.featured, a.tags, a.views, a.read_time, a.created_at,
                   c.name as category, c.slug as category_slug, c.color as category_color 
            FROM blog_articles a 
            LEFT JOIN blog_categories c ON a.category_id = c.id 
            WHERE a.slug = ? AND a.published = 1";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$slug]);
    $article = $stmt->fetch();
    
    if ($article) {
        $article['tags'] = json_decode($article['tags'] ?? '[]', true) ?: [];
        $article['date'] = date('d M Y', strtotime($article['created_at']));
        $article['views'] = (int)$article['views'];
        
        echo json_encode($article);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Article not found']);
    }
    
} catch(PDOException $e) {
    error_log('Database error in article slug: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch article']);
}
?>

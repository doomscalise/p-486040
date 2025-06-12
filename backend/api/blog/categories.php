
<?php
require_once '../config/database.php';

try {
    $stmt = $pdo->query("SELECT * FROM blog_categories ORDER BY name");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($categories);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch categories']);
}
?>


<?php
require_once '../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$articleId = $_GET['id'] ?? '';

if (empty($articleId)) {
    http_response_code(400);
    echo json_encode(['error' => 'Article ID required']);
    exit;
}

try {
    $sql = "UPDATE blog_articles SET views = views + 1 WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$articleId]);
    
    echo json_encode(['success' => true]);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update views']);
}
?>

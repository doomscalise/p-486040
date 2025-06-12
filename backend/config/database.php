
<?php
header('Access-Control-Allow-Origin: https://gambla.it'); // Sostituisci con il tuo dominio
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Configurazione database sicura con variabili d'ambiente
$host = $_ENV['DB_HOST'] ?? 'localhost';
$dbname = $_ENV['DB_NAME'] ?? 'gambla_db';
$username = $_ENV['DB_USER'] ?? '';
$password = $_ENV['DB_PASSWORD'] ?? '';

// Validazione delle credenziali
if (empty($username) || empty($password)) {
    http_response_code(500);
    echo json_encode(['error' => 'Database configuration error']);
    exit;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch(PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Funzione per validare e sanitizzare input
function validateInput($input, $type = 'string', $maxLength = 255) {
    if (empty($input)) {
        return null;
    }
    
    switch($type) {
        case 'email':
            return filter_var($input, FILTER_VALIDATE_EMAIL) ? trim($input) : null;
        case 'slug':
            return preg_match('/^[a-z0-9-]+$/', $input) ? trim($input) : null;
        case 'id':
            return filter_var($input, FILTER_VALIDATE_INT) ? (int)$input : null;
        default:
            return strlen(trim($input)) <= $maxLength ? htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8') : null;
    }
}
?>

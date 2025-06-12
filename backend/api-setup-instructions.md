
# Setup Backend API per Hostinger

## Struttura File Backend (da caricare su Hostinger)

Crea queste cartelle nella root del tuo hosting Hostinger:

```
/api/
  ├── config/
  │   └── database.php
  ├── blog/
  │   ├── categories.php
  │   ├── articles.php
  │   ├── featured.php
  │   └── category/
  │       └── [slug].php
  ├── newsletter/
  │   ├── subscribe.php
  │   └── check/
  │       └── [email].php
  └── .htaccess
```

## Configurazione Database (config/database.php)

```php
<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Configurazione database Hostinger
$host = 'localhost'; // o l'host fornito da Hostinger
$dbname = 'gambla_db';
$username = 'your_db_username';
$password = 'your_db_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}
?>
```

## File .htaccess (nella cartella /api/)

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

# CORS Headers
Header always set Access-Control-Allow-Origin "*"
Header always set Access-Control-Allow-Methods "GET, POST, OPTIONS"
Header always set Access-Control-Allow-Headers "Content-Type"
```

## Variabili Ambiente

Aggiorna il file `.env` (o configura le variabili nel tuo hosting):

```
REACT_APP_DB_HOST=your_hostinger_db_host
REACT_APP_DB_USER=your_db_username
REACT_APP_DB_PASSWORD=your_db_password
REACT_APP_DB_NAME=gambla_db
REACT_APP_API_URL=https://yourdomain.com/api
```

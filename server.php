<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Adjust the base path according to your project structure
$base_path = __DIR__.'/public';

if ($uri !== '/' && file_exists($base_path.$uri)) {
    return false;
}

require_once $base_path.'/index.php';
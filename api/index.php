<?php

// echo "HALLO PHP DARI RUN";

// Buat struktur folder temporary untuk Laravel di Vercel
$directories = [
    '/tmp/storage/robot',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/bootstrap/cache',
];

foreach ($directories as $directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';
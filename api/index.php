<?php
// Ensure this script only runs on Vercel
$_ENV['IS_VERCEL'] = '1';
putenv('IS_VERCEL=1');

$storagePath = '/tmp/storage';
$directories = [
    "$storagePath/app",
    "$storagePath/framework/cache/data",
    "$storagePath/framework/sessions",
    "$storagePath/framework/views",
    "$storagePath/logs",
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Override Laravel compiled views path
putenv("VIEW_COMPILED_PATH=$storagePath/framework/views");

require __DIR__ . '/../public/index.php';

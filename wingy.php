<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bildergalerie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .gallery a {
            display: block;
            border: 1px solid #ccc;
            background: #fff;
            padding: 5px;
            transition: transform 0.2s;
        }
        .gallery a:hover {
            transform: scale(1.05);
        }
        .gallery img {
            max-height: 300px;
            height: auto;
            width: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>

<h1>Bildergalerie</h1>

<div class="gallery">
<?php
$directory = 'images';
$allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

if (is_dir($directory)) {
    $files = scandir($directory);
    foreach ($files as $file) {
        $path = $directory . '/' . $file;
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed_types) && is_file($path)) {
            echo '<a href="' . htmlspecialchars($path) . '" target="_blank">';
            echo '<img src="' . htmlspecialchars($path) . '" alt="">';
            echo '</a>';
        }
    }
} else {
    echo '<p>Ordner "images" wurde nicht gefunden.</p>';
}
?>
</div>

</body>
</html>

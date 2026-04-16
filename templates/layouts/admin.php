<?php
/** @var string $title */
/** @var string $content */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title ?? 'Admin') ?> | ByteOath</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;500&family=Fira+Code&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/tailwind.css">
  <style>
    body { font-family: 'Poppins', sans-serif; background: #1A2238; color: #fff; }
    :focus-visible { outline: 2px solid #00D4FF; outline-offset: 3px; border-radius: 4px; }
    .bo-input {
      width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12);
      border-radius: 8px; padding: 0.65rem 1rem; color: #fff; font-size: 0.9rem;
      font-family: 'Poppins', sans-serif; transition: border-color 0.2s;
    }
    .bo-input:focus { outline: none; border-color: #00D4FF; box-shadow: 0 0 0 3px rgba(0,212,255,0.1); }
    .bo-input::placeholder { color: #8E9AAF; }
  </style>
</head>
<body class="min-h-screen bg-primary font-body antialiased">
  <?= $content ?>
</body>
</html>


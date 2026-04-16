<?php
/** @var array  $config  — full config array */
/** @var string $title   — page title */
/** @var string $description — meta description */
/** @var string $content — rendered page body */
$siteName = $config['site_name'];
$canonical = rtrim($config['site_url'], '/') . strtok($_SERVER['REQUEST_URI'], '?');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title ?? $siteName) ?> | <?= $siteName ?></title>
  <meta name="description" content="<?= htmlspecialchars($description ?? '') ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- OG -->
  <meta property="og:title"       content="<?= htmlspecialchars($title ?? $siteName) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($description ?? '') ?>">
  <meta property="og:url"         content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:type"        content="website">
  <meta property="og:site_name"   content="<?= $siteName ?>">

  <!-- Favicon -->
  <link rel="icon" href="/assets/brand/logo_icon_color.svg" type="image/svg+xml">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;500&family=Fira+Code:wght@400&display=swap" rel="stylesheet">

  <!-- Compiled Tailwind CSS (built from resources/css/input.css) -->
  <link rel="stylesheet" href="/assets/css/tailwind.css">
</head>
<body class="bg-primary text-white font-body">

<?php $view->include('partials/nav') ?>

<main id="main-content">
  <?= $content ?>
</main>

<?php $view->include('partials/footer') ?>

<script src="/assets/js/main.js" defer></script>
</body>
</html>


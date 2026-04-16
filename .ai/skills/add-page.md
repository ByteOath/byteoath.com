# Skill: Add a Page

_3 steps. No cache, no restart, no config files._

## Step 1 — Controller
```php
// src/Controllers/[Name]Controller.php
<?php
declare(strict_types=1);
namespace ByteOath\Controllers;
use ByteOath\Core\Controller;

class [Name]Controller extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/[slug]', [
            'title'       => '[Page Title]',
            'description' => '[Meta description]',
        ]);
    }
}
```

## Step 2 — Route
```php
// public/index.php — inside the RouteCollector callback
use ByteOath\Controllers\[Name]Controller;

$r->get('/[slug]',  [[Name]Controller::class, 'index']);
$r->get('/[slug]/', [[Name]Controller::class, 'index']);
```

## Step 3 — Template
```php
// templates/pages/[slug].php
<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => '[Eyebrow label]',
  'headline' => '[H1 text]',       // safe HTML allowed: <br> <span class="text-accent">
  'sub'      => '[Subtitle]',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">

    <!-- Cards example -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bo-card reveal" style="padding:2rem;">
        <h3 class="font-display" style="margin-bottom:0.75rem;">[Card Title]</h3>
        <p style="color:#8E9AAF;font-size:0.875rem;">[Card body]</p>
      </div>
    </div>

  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => '[CTA headline]',
  'sub'      => '[CTA sub]',
]) ?>
```

## Add to nav (optional)
```php
// templates/partials/nav.php
$navLinks = [
  'Services' => '/services/',
  'Work'     => '/work/',
  '[Label]'  => '/[slug]/',   // ← add here
  'About'    => '/about/',
];
```


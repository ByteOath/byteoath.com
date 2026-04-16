<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use ByteOath\Core\{Config, Env, Router, View};
use ByteOath\Controllers\{
    HomeController, AboutController, ServicesController,
    WorkController, ContactController,
    ApiController, AdminController
};
use FastRoute\RouteCollector;

// ── Environment ───────────────────────────────────────────────────────────────
Env::load(dirname(__DIR__) . '/.env');

// ── Configuration ─────────────────────────────────────────────────────────────
Config::load([
    'site_name'    => 'ByteOath',
    'tagline'      => 'AI-First. Promise-Backed.',
    'site_url'     => Env::get('SITE_URL', 'https://byteoath.com'),
    'contact_email'=> Env::get('CONTACT_EMAIL', 'hello@byteoath.com'),
    'base_path'    => '',

    'app_store_url'=> Env::get('APP_STORE_URL', '#') ?: '#',
    'github_url'   => Env::get('GITHUB_URL',    '#') ?: '#',
    'linkedin_url' => Env::get('LINKEDIN_URL',  '#') ?: '#',

    'brand' => [
        'bg'          => '#1A2238',
        'bg_card'     => '#1E2A42',
        'accent'      => '#00D4FF',
        'accent_dark' => '#00A8CC',
        'text'        => '#FFFFFF',
        'muted'       => '#8E9AAF',
        'border'      => 'rgba(0,212,255,0.15)',
    ],
]);

// ── View ──────────────────────────────────────────────────────────────────────
$view = new View(dirname(__DIR__) . '/templates');
$view->share([
    'config' => Config::all(),
    'brand'  => Config::get('brand'),
]);

// ── Routes ────────────────────────────────────────────────────────────────────
$router = new Router($view, function (RouteCollector $r) {

    // ── Public pages ──────────────────────────────────────────────────────────
    $r->get('/',                                        [HomeController::class,     'index']);
    $r->get('/about',                                   [AboutController::class,    'index']);
    $r->get('/about/',                                  [AboutController::class,    'index']);
    $r->get('/services',                                [ServicesController::class, 'index']);
    $r->get('/services/',                               [ServicesController::class, 'index']);
    $r->get('/services/shopify-apps',                   [ServicesController::class, 'shopify']);
    $r->get('/services/shopify-apps/',                  [ServicesController::class, 'shopify']);
    $r->get('/services/magento-2',                      [ServicesController::class, 'magento']);
    $r->get('/services/magento-2/',                     [ServicesController::class, 'magento']);
    $r->get('/services/ecommerce-platforms',            [ServicesController::class, 'platforms']);
    $r->get('/services/ecommerce-platforms/',           [ServicesController::class, 'platforms']);
    $r->get('/work',                                    [WorkController::class,     'index']);
    $r->get('/work/',                                   [WorkController::class,     'index']);
    $r->get('/work/omnibus',                            [WorkController::class,     'omnibus']);
    $r->get('/work/omnibus/',                           [WorkController::class,     'omnibus']);
    $r->get('/contact',                                 [ContactController::class,  'index']);
    $r->get('/contact/',                                [ContactController::class,  'index']);

    // ── API ───────────────────────────────────────────────────────────────────
    $r->post('/api/contact',                            [ApiController::class,      'contact']);

    // ── Admin ─────────────────────────────────────────────────────────────────
    $r->get('/admin',                                   [AdminController::class,    'index']);
    $r->get('/admin/',                                  [AdminController::class,    'index']);
    $r->get('/admin/login',                             [AdminController::class,    'loginForm']);
    $r->post('/admin/login',                            [AdminController::class,    'loginPost']);
    $r->get('/admin/logout',                            [AdminController::class,    'logout']);
    $r->get('/admin/delete',                            [AdminController::class,    'delete']);
});

$router->dispatch();


<?php

declare(strict_types=1);

namespace ByteOath\Controllers;

use ByteOath\Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/home', [
            'title'       => 'eCommerce Dev That Ships',
            'description' => 'Shopify apps, Magento 2 platforms, and eCommerce architecture — built with AI precision and merchant-first thinking.',
        ]);
    }
}


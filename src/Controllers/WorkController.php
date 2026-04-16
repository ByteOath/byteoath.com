<?php declare(strict_types=1);
namespace ByteOath\Controllers;
use ByteOath\Core\Controller;

class WorkController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/work/index', [
            'title'       => 'Our Work',
            'description' => 'What ByteOath has shipped — live Shopify apps and production eCommerce projects.',
        ]);
    }

    public function omnibus(): void
    {
        $this->view->render('pages/work/omnibus', [
            'title'       => 'Omnibus — EU Price Compliance for Shopify',
            'description' => 'Case study: ByteOath built a live Shopify app automating the EU Omnibus Directive for merchants.',
        ]);
    }
}


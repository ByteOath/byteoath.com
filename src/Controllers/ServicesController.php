<?php declare(strict_types=1);
namespace ByteOath\Controllers;
use ByteOath\Core\Controller;

class ServicesController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/services/index', [
            'title'       => 'Services',
            'description' => 'Shopify apps, Magento 2 development, and headless eCommerce architecture. Deep specialism, AI-augmented delivery.',
        ]);
    }

    public function shopify(): void
    {
        $this->view->render('pages/services/shopify', [
            'title'       => 'Shopify App Development',
            'description' => 'Full-stack Shopify app development — App Store submissions, Shopify Functions, Polaris UI, Billing API.',
        ]);
    }

    public function magento(): void
    {
        $this->view->render('pages/services/magento', [
            'title'       => 'Magento 2 Development',
            'description' => 'Custom Magento 2 modules, third-party integrations, performance audits. Clean code, no cowboy patches.',
        ]);
    }

    public function platforms(): void
    {
        $this->view->render('pages/services/platforms', [
            'title'       => 'eCommerce Platform Architecture',
            'description' => 'Headless commerce, composable architecture, platform migrations. When off-the-shelf isn\'t enough.',
        ]);
    }
}


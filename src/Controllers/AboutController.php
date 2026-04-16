<?php declare(strict_types=1);
namespace ByteOath\Controllers;
use ByteOath\Core\Controller;

class AboutController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/about', [
            'title'       => 'About ByteOath',
            'description' => 'No office, no overhead. A lean team of eCommerce engineers — AI-augmented delivery with human business judgment.',
        ]);
    }
}


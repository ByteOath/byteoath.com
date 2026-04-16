<?php declare(strict_types=1);
namespace ByteOath\Controllers;
use ByteOath\Core\Controller;

class ContactController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/contact', [
            'title'       => "Let's Talk",
            'description' => "Tell us what you're building. ByteOath replies within 1 business day.",
        ]);
    }
}


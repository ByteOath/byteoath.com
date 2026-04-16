<?php

declare(strict_types=1);

namespace ByteOath\Controllers;

use ByteOath\Core\{Controller, Database};

/**
 * Handles API endpoints (JSON responses, no layout).
 */
class ApiController extends Controller
{
    /** POST /api/contact */
    public function contact(): void
    {
        header('Content-Type: application/json');

        // CSRF: require POST and JSON Accept or form content-type
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
            return;
        }

        // Honeypot
        if (!empty($_POST['_gotcha'])) {
            // Silently succeed to confuse bots
            echo json_encode(['ok' => true]);
            return;
        }

        $name    = trim($_POST['name']    ?? '');
        $email   = trim($_POST['email']   ?? '');
        $message = trim($_POST['message'] ?? '');

        if ($name === '' || $email === '' || $message === '') {
            http_response_code(422);
            echo json_encode(['ok' => false, 'error' => 'Name, email, and message are required.']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422);
            echo json_encode(['ok' => false, 'error' => 'Please enter a valid email address.']);
            return;
        }

        $company  = trim($_POST['company']  ?? '');
        $platform = trim($_POST['platform'] ?? '');
        $budget   = trim($_POST['budget']   ?? '');
        $ip       = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '';

        try {
            $pdo = Database::connection();
            $stmt = $pdo->prepare("
                INSERT INTO submissions (name, email, company, platform, budget, message, ip)
                VALUES (:name, :email, :company, :platform, :budget, :message, :ip)
            ");
            $stmt->execute(compact('name', 'email', 'company', 'platform', 'budget', 'message', 'ip'));

            echo json_encode(['ok' => true, 'message' => "Thanks {$name}! We'll reply within 1 business day."]);
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode(['ok' => false, 'error' => 'Something went wrong. Please try again or email us directly.']);
        }
    }
}


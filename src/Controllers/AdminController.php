<?php

declare(strict_types=1);

namespace ByteOath\Controllers;

use ByteOath\Core\{Controller, Config, Database, Env};

class AdminController extends Controller
{
    private const SESSION_KEY = 'bo_admin';

    // ── Auth helpers ──────────────────────────────────────────────────────────

    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_name('bo_sess');
            session_start();
        }
    }

    private function isAuthenticated(): bool
    {
        $this->startSession();
        return ($_SESSION[self::SESSION_KEY] ?? false) === true;
    }

    private function requireAuth(): void
    {
        if (!$this->isAuthenticated()) {
            header('Location: /admin/login');
            exit;
        }
    }

    // ── Routes ────────────────────────────────────────────────────────────────

    /** GET /admin/ */
    public function index(): void
    {
        $this->requireAuth();

        $pdo  = Database::connection();
        $rows = $pdo->query("SELECT * FROM submissions ORDER BY created_at DESC")->fetchAll();

        $this->view->render('pages/admin/dashboard', [
            'title'       => 'Admin — Submissions',
            'rows'        => $rows,
            'total'       => count($rows),
        ], 'admin');
    }

    /** GET /admin/login */
    public function loginForm(): void
    {
        if ($this->isAuthenticated()) {
            header('Location: /admin/');
            exit;
        }
        $this->view->render('pages/admin/login', [
            'title' => 'Admin Login',
            'error' => '',
        ], 'admin');
    }

    /** POST /admin/login */
    public function loginPost(): void
    {
        $this->startSession();

        $user     = trim($_POST['username'] ?? '');
        $pass     = $_POST['password'] ?? '';
        $cfgUser  = Env::get('ADMIN_USER', 'admin');
        $cfgHash  = Env::get('ADMIN_PASS_HASH');

        if ($user === $cfgUser && $cfgHash !== '' && password_verify($pass, $cfgHash)) {
            session_regenerate_id(true);
            $_SESSION[self::SESSION_KEY] = true;
            header('Location: /admin/');
            exit;
        }

        // Failed — re-render login with error
        $this->view->render('pages/admin/login', [
            'title' => 'Admin Login',
            'error' => 'Invalid username or password.',
        ], 'admin');
    }

    /** GET /admin/logout */
    public function logout(): void
    {
        $this->startSession();
        $_SESSION = [];
        session_destroy();
        header('Location: /admin/login');
        exit;
    }

    /** GET /admin/submissions/{id}/delete  (POST-redirect-GET via query string for simplicity) */
    public function delete(): void
    {
        $this->requireAuth();

        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            Database::connection()->prepare("DELETE FROM submissions WHERE id = ?")->execute([$id]);
        }
        header('Location: /admin/');
        exit;
    }
}


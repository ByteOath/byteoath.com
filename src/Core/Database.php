<?php

declare(strict_types=1);

namespace ByteOath\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function connection(): PDO
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        $storagePath = dirname(__DIR__, 2) . '/storage';

        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0775, true);
        }

        $dsn = "sqlite:{$storagePath}/submissions.sqlite";

        self::$instance = new PDO($dsn, options: [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        self::migrate(self::$instance);

        return self::$instance;
    }

    private static function migrate(PDO $pdo): void
    {
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS submissions (
                id         INTEGER PRIMARY KEY AUTOINCREMENT,
                name       TEXT    NOT NULL,
                email      TEXT    NOT NULL,
                company    TEXT,
                platform   TEXT,
                budget     TEXT,
                message    TEXT    NOT NULL,
                ip         TEXT,
                created_at DATETIME DEFAULT (datetime('now'))
            );
        ");
    }
}


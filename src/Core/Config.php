<?php

declare(strict_types=1);

namespace ByteOath\Core;

class Config
{
    private static array $data = [];

    public static function load(array $config): void
    {
        self::$data = array_merge(self::$data, $config);
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return self::$data[$key] ?? $default;
    }

    public static function all(): array
    {
        return self::$data;
    }
}


<?php

declare(strict_types=1);

namespace ByteOath\Core;

/** Base class all controllers extend. */
abstract class Controller
{
    public function __construct(protected View $view) {}
}


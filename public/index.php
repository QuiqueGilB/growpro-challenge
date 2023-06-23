<?php

use QuiqueGilB\GrowPro\SharedContext\SymfonyModule\Infrastructure\Symfony\Kernel\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return static fn (array $context)  => new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

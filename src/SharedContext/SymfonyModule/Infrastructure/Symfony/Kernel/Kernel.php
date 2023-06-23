<?php

namespace QuiqueGilB\GrowPro\SharedContext\SymfonyModule\Infrastructure\Symfony\Kernel;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}

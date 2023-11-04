<?php
declare(strict_types=1);
namespace Horde\EnvironmentUtils;

use InvalidArgumentException;
use IteratorAggregate;
use RuntimeException;
use Traversable;
use Countable;
/**
 * Wrap a copy of Environment into a simple, typed object for DI
 */
class EnvironmentFromGetenv extends Environment
{
    public function __construct()
    {
        $env = getenv();
        parent::__construct($env);

    }
}
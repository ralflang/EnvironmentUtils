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
class Environment implements IteratorAggregate, Countable
{
    private readonly array $environment;

    public function __construct(array $environment)
    {
        $environmentCopy = [];
        // TODO: Check if the array is actually Environment-like
        foreach ($environment as $name => $value) {
            if (!is_string($name) or !is_string($value) {
                throw new InvalidArgumentException('All members of Environment must be strings.');
            }
            $EnvironmentCopy[$name] = $value;
        }
        $this->environment = $EnvironmentCopy;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->environment);
    }

    public function count(): int
    {
        return count($this->environment);
    }
}
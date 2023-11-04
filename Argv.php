<?php
declare(strict_types=1);
namespace Horde\EnvironmentUtils;

use InvalidArgumentException;
use IteratorAggregate;
use RuntimeException;
use Traversable;
use Countable;
/**
 * Wrap a copy of Argv into a simple, typed object for DI
 */
class Argv implements IteratorAggregate, Countable
{
    private readonly array $argv;

    public function __construct(array $argv)
    {
        $argvCopy = [];
        // TODO: Check if the array is actually argv-like
        foreach ($argv as $pos => $argument) {
            if (!is_string($argument)) {
                throw new InvalidArgumentException('All members of argv must be strings.');
            }

            $argvCopy[] = $argument;
        }
        $this->argv = $argvCopy;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->argv);
    }

    public function count(): int
    {
        return count($this->argv);
    }

}
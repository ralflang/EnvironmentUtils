<?php
declare(strict_types=1);
namespace Horde\EnvironmentUtils;

use InvalidArgumentException;
use IteratorAggregate;
use RuntimeException;
use Traversable;
use Countable;
/**
 * By design, the Argv class does not provide defaults as neither from globals nor empty are good behaviour when injection was simply forgotten.
 * This class however does ONLY work from globals
 * Use it for an injection pattern like __construct(Argv $argv = new ArgvFromGlobal)
 */
final class ArgvFromGlobal extends Argv
{
    public function __construct()
    {
        if (empty($GLOBALS['argv']))
        {
            // Argv always contains at least the binary's name so this indicates a severe error
            throw new RuntimeException("Argv Global is not available or in invalid state");
        }
        parent::__construct($GLOBALS['argv'])
    }
}
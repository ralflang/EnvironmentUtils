<?php
declare(strict_types=1);

namespace Horde\EnvironmentUtils;
/**
 * Save the CWD at the time of object creation, i.e. to return to it later
 */
class CurrentWorkingDirectory
{
    private readonly string $cwd;
    public function __construct()
    {
        $this->cwd = (string) getcwd();
    }

    /**
     * Returns true if either the CWD is known
     *
     */
    public function has(): bool
    {
        return (bool) $this->cwd;
    }

    /**
     * Return the CWD or an empty string.
     */
    public function get(): string
    {
        return $this->cwd;
    }

    public function chdir(string $target): CurrentWorkingDirectory
    {
        chdir($target);
        // Update from OS, don't just assume success
        return new self;
    }
}
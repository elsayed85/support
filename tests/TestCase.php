<?php
/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2023 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

namespace Tests;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Facades\Filesystem\Directory;
use DragonCode\Support\Facades\Helpers\Str;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        Facade::clearResolvedInstances();

        parent::setUp();

        $this->destroyTempDirectory();
    }

    protected function tempDirectory(?string $path = null): string
    {
        $prefix = $this->tempDirectoryPrefix();

        $time = Str::camel(microtime());

        $path = ltrim((string) $path, '/');

        return implode(DIRECTORY_SEPARATOR, [$prefix, $time, $path]);
    }

    protected function fixturesDirectory(?string $path = null): string
    {
        $path = ! empty($path) ? ltrim($path, '/') : '';

        return realpath(__DIR__ . '/Fixtures/' . $path);
    }

    protected function destroyTempDirectory()
    {
        $path = $this->tempDirectoryPrefix();

        Directory::ensureDelete($path);
    }

    protected function tempDirectoryPrefix(): string
    {
        return __DIR__ . '/tmp';
    }
}

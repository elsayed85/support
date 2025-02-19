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

declare(strict_types=1);

namespace Tests\Unit\Filesystem\Directory;

use DragonCode\Support\Facades\Filesystem\Directory;
use Tests\TestCase;

class IsDirectoryTest extends TestCase
{
    public function testIsDirectory()
    {
        $this->assertTrue(Directory::isDirectory($this->fixturesDirectory()));

        $this->assertTrue(Directory::isDirectory($this->fixturesDirectory('Contracts')));
        $this->assertTrue(Directory::isDirectory($this->fixturesDirectory('Instances')));

        $this->assertFalse(Directory::isDirectory($this->fixturesDirectory('Contracts/Contract.php')));
        $this->assertFalse(Directory::isDirectory($this->fixturesDirectory('Instances/Foo.php')));
    }
}

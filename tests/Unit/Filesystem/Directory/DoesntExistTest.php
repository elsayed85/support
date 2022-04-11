<?php

/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

declare(strict_types=1);

namespace Tests\Unit\Filesystem\Directory;

use DragonCode\Support\Facades\Filesystem\Directory;
use Tests\TestCase;

class DoesntExistTest extends TestCase
{
    public function testDoesntExist()
    {
        $this->assertTrue(Directory::doesntExist(__DIR__ . '/Foo'));
        $this->assertTrue(Directory::doesntExist(__DIR__ . '/AllTest.php'));
    }
}

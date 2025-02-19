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

namespace Tests\Unit\Exceptions;

use ArgumentCountError;
use DragonCode\Support\Exceptions\NotValidUrlException;
use Tests\TestCase;

class NotValidUrlExceptionTest extends TestCase
{
    public function testPath()
    {
        $this->expectException(NotValidUrlException::class);
        $this->expectExceptionMessage('The "example" is not a valid URL.');

        throw new NotValidUrlException('example');
    }

    public function testEmptyPath()
    {
        $this->expectException(NotValidUrlException::class);
        $this->expectExceptionMessage('Empty string is not a valid URL.');

        throw new NotValidUrlException(null);
    }

    public function testWithoutParameter()
    {
        $this->expectException(ArgumentCountError::class);

        throw new NotValidUrlException();
    }
}

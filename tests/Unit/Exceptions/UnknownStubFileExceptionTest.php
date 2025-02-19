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
use DragonCode\Support\Exceptions\UnknownStubFileException;
use Tests\TestCase;

class UnknownStubFileExceptionTest extends TestCase
{
    public function testPath()
    {
        $this->expectException(UnknownStubFileException::class);
        $this->expectExceptionMessage('Unknown stub file: "foo"');

        throw new UnknownStubFileException('foo');
    }

    public function testEmptyPath()
    {
        $this->expectException(UnknownStubFileException::class);
        $this->expectExceptionMessage('Unknown stub file: ""');

        throw new UnknownStubFileException(null);
    }

    public function testWithoutParameter()
    {
        $this->expectException(ArgumentCountError::class);

        throw new UnknownStubFileException();
    }
}

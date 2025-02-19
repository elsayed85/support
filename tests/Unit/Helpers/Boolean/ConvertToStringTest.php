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

namespace Tests\Unit\Helpers\Boolean;

use DragonCode\Support\Facades\Helpers\Boolean;
use Tests\TestCase;

class ConvertToStringTest extends TestCase
{
    public function testConvertToString()
    {
        $this->assertSame('true', Boolean::toString(true));
        $this->assertSame('true', Boolean::toString(1));

        $this->assertSame('false', Boolean::toString(false));
        $this->assertSame('false', Boolean::toString(0));
    }
}

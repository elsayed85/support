<?php
/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2021 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

namespace Tests\Unit\Instances\Helpers\Http\Builder;

use DragonCode\Support\Helpers\Http\Builder;
use Psr\Http\Message\UriInterface;
use Tests\Unit\Instances\Helpers\Http\Base;

class ToPsrMethodTest extends Base
{
    public function testBuilder()
    {
        $this->assertInstanceOf(Builder::class, \DragonCode\Support\Facades\Http\Builder::toPsr());
        $this->assertInstanceOf(Builder::class, \DragonCode\Support\Facades\Http\Builder::same()->parse($this->test_url)->toPsr());
        $this->assertInstanceOf(Builder::class, \DragonCode\Support\Facades\Http\Builder::parse($this->test_url)->toPsr());
    }

    public function testInterface()
    {
        $this->assertInstanceOf(UriInterface::class, \DragonCode\Support\Facades\Http\Builder::toPsr());
        $this->assertInstanceOf(UriInterface::class, \DragonCode\Support\Facades\Http\Builder::same()->parse($this->test_url)->toPsr());
        $this->assertInstanceOf(UriInterface::class, \DragonCode\Support\Facades\Http\Builder::parse($this->test_url)->toPsr());
    }
}

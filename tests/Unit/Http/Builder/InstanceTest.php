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

namespace Tests\Unit\Http\Builder;

use DragonCode\Support\Facades\Http\Builder as BuilderFacade;
use DragonCode\Support\Http\Builder;
use Psr\Http\Message\UriInterface;

class InstanceTest extends Base
{
    public function testBuilder()
    {
        $this->assertInstanceOf(Builder::class, BuilderFacade::same());
        $this->assertInstanceOf(Builder::class, BuilderFacade::same());
        $this->assertInstanceOf(Builder::class, BuilderFacade::parse($this->test_url));
    }

    public function testInterface()
    {
        $this->assertInstanceOf(UriInterface::class, BuilderFacade::same());
        $this->assertInstanceOf(UriInterface::class, BuilderFacade::same());
        $this->assertInstanceOf(UriInterface::class, BuilderFacade::parse($this->test_url));
    }
}

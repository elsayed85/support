<?php
/*
 * This file is part of the "andrey-helldar/support" project.
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
 * @see https://github.com/andrey-helldar/support
 */

namespace Tests\Facades\Helpers\Http\Builder;

use DragonCode\Support\Facades\Http\Builder as BuilderFacade;
use Tests\Facades\Helpers\Http\Base;

class GetBaseUrlMethodTest extends Base
{
    public function testFull()
    {
        $builder = BuilderFacade::parse($this->test_url);

        $this->assertIsString($builder->getBaseUrl());
        $this->assertSame('https://en.example.com', $builder->getBaseUrl());
    }

    public function testOnlyHost()
    {
        $builder = BuilderFacade::parsed(['host' => 'example.com']);

        $this->assertIsString($builder->getBaseUrl());
        $this->assertSame('example.com', $builder->getBaseUrl());
    }

    public function testEmpty()
    {
        $this->assertIsString(BuilderFacade::getBaseUrl());
        $this->assertEmpty(BuilderFacade::getBaseUrl());
    }
}

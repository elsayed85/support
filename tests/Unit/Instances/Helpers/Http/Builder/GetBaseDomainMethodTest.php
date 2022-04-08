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

declare(strict_types=1);

namespace Tests\Unit\Instances\Helpers\Http\Builder;

use DragonCode\Support\Facades\Http\Builder;
use Tests\Unit\Instances\Helpers\Http\Base;

class GetBaseDomainMethodTest extends Base
{
    public function testShort()
    {
        $builder = Builder::parse($this->test_url);

        $this->assertIsString($builder->getBaseDomain());
        $this->assertSame('example.com', $builder->getBaseDomain());
    }

    public function testFull()
    {
        $builder = Builder::parse($this->psr_url);

        $this->assertIsString($builder->getBaseDomain());
        $this->assertSame('example.com', $builder->getBaseDomain());
    }

    public function testEmpty()
    {
        $this->assertIsString(Builder::getBaseDomain());
        $this->assertEmpty(Builder::getBaseDomain());
    }
}

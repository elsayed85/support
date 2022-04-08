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

use DragonCode\Support\Facades\Http\Builder;
use Tests\Unit\Instances\Helpers\Http\Base;

class WithPathMethodTest extends Base
{
    public function testWithoutPrefix()
    {
        $builder = Builder::same();

        $this->assertIsString($builder->getPath());
        $this->assertEmpty($builder->getPath());

        $builder->withPath('foo/bar');

        $this->assertIsString($builder->getPath());
        $this->assertSame('/foo/bar', $builder->getPath());
    }

    public function testWithPrefix()
    {
        $builder = Builder::same();

        $this->assertIsString($builder->getPath());
        $this->assertEmpty($builder->getPath());

        $builder->withPath('/foo/bar');

        $this->assertIsString($builder->getPath());
        $this->assertSame('/foo/bar', $builder->getPath());
    }

    public function testSet()
    {
        $builder = Builder::parse($this->test_url);

        $builder->withPath('/foo/bar');

        $this->assertIsString($builder->getPath());
        $this->assertSame('/foo/bar', $builder->getPath());
    }

    public function testEmpty()
    {
        $builder = Builder::parse($this->psr_url);

        $builder->withPath('');

        $this->assertIsString($builder->getPath());
        $this->assertEmpty($builder->getPath());
    }

    public function testNull()
    {
        $builder = Builder::parse($this->psr_url);

        $builder->withPath(null);

        $this->assertIsString($builder->getPath());
        $this->assertEmpty($builder->getPath());
    }
}

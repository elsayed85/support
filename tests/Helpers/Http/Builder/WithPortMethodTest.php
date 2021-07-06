<?php

namespace Tests\Helpers\Http\Builder;

use Tests\Helpers\Http\Base;

class WithPortMethodTest extends Base
{
    public function testEmpty()
    {
        $builder = $this->builder()->parse($this->test_url);

        $this->assertNull($builder->getPort());

        $builder->withPort($this->psr_port);

        $this->assertIsNumeric($builder->getPort());
        $this->assertSame($this->psr_port, $builder->getPort());
    }

    public function testReplace()
    {
        $builder = $this->builder()->parse($this->psr_url);

        $this->assertIsNumeric($builder->getPort());
        $this->assertSame($this->psr_port, $builder->getPort());

        $builder->withPort(1234);

        $this->assertIsNumeric($builder->getPort());
        $this->assertSame(1234, $builder->getPort());
    }
}

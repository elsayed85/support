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

use DragonCode\Support\Facades\Http\Builder;

class ParsedMethodTest extends Base
{
    public function testShort()
    {
        $parsed = parse_url('https://localhost/foo/bar');

        $builder = Builder::parsed($parsed);

        $this->assertSame('https', $builder->getScheme());
        $this->assertSame('localhost', $builder->getHost());
        $this->assertSame('/foo/bar', $builder->getPath());

        $this->assertEmpty($builder->getPort());
        $this->assertEmpty($builder->getUser());
        $this->assertEmpty($builder->getQuery());
        $this->assertEmpty($builder->getPassword());
        $this->assertEmpty($builder->getFragment());
    }

    public function testFull()
    {
        $parsed = parse_url($this->psr_url);

        $builder = Builder::parsed($parsed);

        $this->assertSame($this->psr_scheme, $builder->getScheme());
        $this->assertSame($this->psr_user, $builder->getUser());
        $this->assertSame($this->psr_pass, $builder->getPassword());
        $this->assertSame($this->psr_host, $builder->getHost());
        $this->assertSame($this->psr_port, $builder->getPort());
        $this->assertSame($this->psr_path, $builder->getPath());
        $this->assertSame($this->psr_query, $builder->getQuery());
        $this->assertSame($this->psr_fragment, $builder->getFragment());
    }

    public function testParsedCustomWithNormal()
    {
        $parsed = [
            'scheme'   => $this->psr_scheme,
            'host'     => $this->psr_host,
            'user'     => $this->psr_user,
            'pass'     => $this->psr_pass,
            'path'     => $this->psr_path,
            'query'    => $this->psr_query,
            'fragment' => $this->psr_fragment,
            'foo'      => 'bar',
            'bar'      => 'baz',
            '123'      => 456,
            567        => 890,
        ];

        $builder = Builder::parsed($parsed);

        $this->assertSame($this->psr_scheme, $builder->getScheme());
        $this->assertSame($this->psr_user, $builder->getUser());
        $this->assertSame($this->psr_pass, $builder->getPassword());
        $this->assertSame($this->psr_host, $builder->getHost());
        $this->assertSame($this->psr_path, $builder->getPath());
        $this->assertSame($this->psr_query, $builder->getQuery());
        $this->assertSame($this->psr_fragment, $builder->getFragment());

        $this->assertNull($builder->getPort());
    }

    public function testParsedEmpty()
    {
        $builder = Builder::parsed([]);

        $this->assertEmpty($builder->getScheme());
        $this->assertEmpty($builder->getUser());
        $this->assertEmpty($builder->getPassword());
        $this->assertEmpty($builder->getHost());
        $this->assertEmpty($builder->getPort());
        $this->assertEmpty($builder->getPath());
        $this->assertEmpty($builder->getQuery());
        $this->assertEmpty($builder->getFragment());

        $this->assertNotNull($builder->getScheme());
        $this->assertNotNull($builder->getUser());
        $this->assertNotNull($builder->getPassword());
        $this->assertNotNull($builder->getHost());
        $this->assertNotNull($builder->getPath());
        $this->assertNotNull($builder->getQuery());
        $this->assertNotNull($builder->getFragment());

        $this->assertNull($builder->getPort());
    }
}

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

namespace Tests\Unit\Concerns\Castable;

use DragonCode\Support\Concerns\Castable;
use Tests\TestCase;

class DefaultTest extends TestCase
{
    use Castable;

    public function testDefault()
    {
        $source = [
            'q1' => 'Foo',
            'q2' => 123,
            'q3' => '123',
            'q4' => null,
            'q5' => [],
            'q6' => '',
        ];

        $expected = [
            'q1' => 'Foo',
            'q2' => 123,
            'q3' => '123',
            'q4' => null,
            'q5' => [],
            'q6' => '',
        ];

        $this->cast($source);

        $this->assertSame($expected, $source);
    }
}

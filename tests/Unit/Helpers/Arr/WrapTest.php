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

namespace Tests\Unit\Helpers\Arr;

use DragonCode\Support\Facades\Helpers\Arr;
use Tests\TestCase;

class WrapTest extends TestCase
{
    public function testWrap()
    {
        $this->assertEquals(['data'], Arr::wrap('data'));
        $this->assertEquals(['data'], Arr::wrap(['data']));
        $this->assertEquals([1], Arr::wrap(1));
    }
}

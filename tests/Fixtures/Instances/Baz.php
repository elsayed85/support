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

namespace Tests\Fixtures\Instances;

use Tests\Fixtures\Concerns\Foable;

class Baz extends Bat
{
    use Foable;

    public string $first = 'foo';

    public string $second = 'bar';

    public function toArray(): array
    {
        return ['qwerty' => 'Qwerty'];
    }
}

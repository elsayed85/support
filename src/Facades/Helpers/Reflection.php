<?php
/******************************************************************************
 * This file is part of the "andrey-helldar/support" project.                 *
 *                                                                            *
 * @author Andrey Helldar <helldar@ai-rus.com>                                *
 *                                                                            *
 * @copyright 2021 Andrey Helldar                                             *
 *                                                                            *
 * @license MIT                                                               *
 *                                                                            *
 * @see https://github.com/andrey-helldar/support                             *
 *                                                                            *
 * For the full copyright and license information, please view the LICENSE    *
 * file that was distributed with this source code.                           *
 ******************************************************************************/

namespace DragonCode\Support\Facades\Helpers;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Helpers\Reflection as Helper;
use ReflectionClass;

/**
 * @method static array getConstants(object|string $class)
 * @method static ReflectionClass resolve(object|ReflectionClass|string $class)
 */
class Reflection extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Helper::class;
    }
}

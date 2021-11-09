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

namespace DragonCode\Support\Exceptions;

use Exception;

class DirectoryNotFoundException extends Exception
{
    public function __construct(?string $path)
    {
        $message = 'Directory "' . $path . '" does not exist.';

        parent::__construct($message);
    }
}

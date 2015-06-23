<?php

/*
 * This file is part of Laravel Logger Core.
 *
 * (c) Graham Campbell <graham@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\LoggerCore;

use Psr\Log\LoggerInterface;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * This is the logger trait test class.
 *
 * @author Graham Campbell <graham@cachethq.io>
 */
class LoggerTraitTest extends TestCase
{
    public function canInstantiate()
    {
        $logger = new Logger();

        $this->assertInstanceOf(LoggerInterface::class, $logger);
    }

    public function testCanLog()
    {
        $logger = new Logger();

        $this->expectOutputString('warning: foo');

        $logger->warning('foo');
    }
}

class Logger implements LoggerInterface
{
    use LoggerTrait;

    public function log($level, $message, array $context = [])
    {
        echo "$level: $message";
    }
}

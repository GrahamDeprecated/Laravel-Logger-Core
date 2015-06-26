<?php

/*
 * This file is part of Laravel Logger Core.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\Tests\LoggerCore;

use PHPUnit_Framework_TestCase as TestCase;
use Psr\Log\LoggerInterface;

/**
 * This is the logger trait test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class LoggerTraitTest extends TestCase
{
    public function canInstantiate()
    {
        $logger = new Logger();

        $this->assertInstanceOf(LoggerInterface::class, $logger);
    }

    /**
     * @depends canInstantiate
     */
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

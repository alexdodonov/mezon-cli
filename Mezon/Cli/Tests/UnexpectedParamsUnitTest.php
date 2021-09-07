<?php
namespace Mezon\Cli\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Cli\Tool;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class UnexpectedParamsUnitTest extends TestCase
{

    /**
     * Testing unexpected verb exception
     */
    public function testUnexpectedVeb(): void
    {
        // setup
        global $argv;
        $argv = [
            1 => 'unexpected verb'
        ];

        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The verb "unexpected verb" was not found');

        // test body
        Tool::run();
    }

    /**
     * Testing unexpected entity exception
     */
    public function testUnexpectedEntity(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The entity "unexpected entity" was not found');

        // setup
        global $argv;
        $argv = [
            1 => 'create',
            2 => 'unexpected entity'
        ];

        // test body
        Tool::run();
    }
}

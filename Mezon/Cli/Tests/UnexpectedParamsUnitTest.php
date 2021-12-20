<?php
namespace Mezon\Cli\Tests;

use Mezon\Cli\Tool;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class UnexpectedParamsUnitTest extends Base
{

    /**
     * Testing unexpected verb exception
     */
    public function testNoVerbs(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Verbs not provided!. Try \'mezon help\' for more information.');

        // setup
        $this->setCommand([]);

        // test body
        Tool::run();
    }

    /**
     * Testing unexpected verb exception
     */
    public function testUnexpectedVerb(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The verb "unexpected-verb" was not found');

        // setup
        $this->setCommand([
            'unexpected-verb'
        ]);

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
        $this->setCommand([
            'create',
            'unexpected entity'
        ]);

        // test body
        Tool::run();
    }
}

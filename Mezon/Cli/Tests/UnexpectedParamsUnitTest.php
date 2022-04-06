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
        // setup
        $this->setCommand([]);

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validateOutput($commandLineOutput, [
            'Usage: mezon <verb> <entity> [<options>]',
            'Verbs:',
            '  create' . "\n",
            '  help' . "\n",
            '  version' . "\n",
            'Entities:',
            '  application' . "\n",
            '  fs' . "\n",
            '  htaccess' . "\n"
        ]);
    }

    /**
     * Testing unexpected verb exception
     */
    public function testUnexpectedVerb(): void
    {
        // setup
        $this->setCommand([
            'unexpected-verb'
        ]);

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validateOutput($commandLineOutput, [
            'The verb "unexpected-verb" was not found'
        ]);
    }

    /**
     * Testing unexpected entity exception
     */
    public function testUnexpectedEntity(): void
    {
        // setup
        $this->setCommand([
           'create',
            'unexpected entity'
        ]);

        // test body
        $commandLineOutput = $this->testBody();

        // test body
       $this->validateOutput($commandLineOutput, [
            'The entity "unexpected entity" was not found'
        ]);
    }
}

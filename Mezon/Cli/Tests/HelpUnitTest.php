<?php
namespace Mezon\Cli\Tests;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HelpUnitTest extends Base
{

    /**
     * Testing help command
     */
    public function testHelp(): void
    {
        // setup
        $this->setCommand([
            'help'
        ]);

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
     * Testing help command for unexisting entity
     */
    public function testHelpUnexisting(): void
    {
        // setup
        $this->setCommand([
            'help',
            'unexpected'
        ]);

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validateOutput($commandLineOutput, [
            'Usage: mezon <verb> <entity> [<options>]',
            'Verbs:',
            'Entities:'
        ]);
    }
}

<?php
namespace Mezon\Cli\Tests\Help;

use Mezon\Cli\Tests\Base;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HelpBase extends Base
{

    /**
     * Common test for doc
     *
     * @param string $entity
     *            entity name
     * @param string[] $outputValidators
     *            list of validating string
     */
    protected function helpTest(string $entity, array $outputValidators): void
    {
        // setup
        $this->setCommand([
            'help',
            $entity
        ]);

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validateOutput($commandLineOutput, $outputValidators);
    }
}

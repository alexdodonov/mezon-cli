<?php
namespace Mezon\Cli\Tests;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class VersionUnitTest extends Base
{

    /**
     * Testing version command
     */
    public function testVersion(): void
    {
        // setup
        $this->setCommand([
            'version'
        ]);

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validateOutput($commandLineOutput, [
            'Mezon CLI 1.0.4'
        ]);
    }
}

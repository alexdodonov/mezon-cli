<?php
namespace Mezon\Cli\Tests\Help;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HelpUnitTest extends HelpBase
{

    /**
     * Testing method
     */
    public function testHelpHelp(): void
    {
        $this->helpTest('help', [
            'Usage: mezon help [<option>]'
        ]);
    }
}

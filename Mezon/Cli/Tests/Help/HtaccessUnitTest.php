<?php
namespace Mezon\Cli\Tests\Help;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HtaccessUnitTest extends HelpBase
{

    /**
     * Testing method
     */
    public function testHelpHelp(): void
    {
        $this->helpTest('htaccess', [
            'Description: basic .htaccess file with rules for your server.',
            'Usage: mezon create htaccess'
        ]);
    }
}

<?php
namespace Mezon\Cli\Tests\Help;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ApplicationUnitTest extends HelpBase
{

    /**
     * Testing method
     */
    public function testHelpApplication(): void
    {
        $this->helpTest('application', [
            'Description: basic Application.php file.',
            'Usage: mezon create application'
        ]);
    }
}

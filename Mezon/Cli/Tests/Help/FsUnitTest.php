<?php
namespace Mezon\Cli\Tests\Help;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FsUnitTest extends HelpBase
{

    /**
     * Testing method
     */
    public function testHelpFs(): void
    {
        $this->helpTest('fs', [
            'Description: default folder structure will be created.',
            'Usage: mezon create fs',
            '       mezon create fs [<path>]'
        ]);
    }
}

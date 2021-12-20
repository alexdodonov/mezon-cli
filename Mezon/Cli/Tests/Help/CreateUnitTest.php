<?php
namespace Mezon\Cli\Tests\Help;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class CreateUnitTest extends HelpBase
{

    /**
     * Testing method
     */
    public function testHelpCreate(): void
    {
        $this->helpTest('create', [
            'Description: create a basic structure of the entity specified.',
            'Usage: mezon create htaccess',
            '       mezon create application',
            '       mezon create fs'
        ]);
    }
}

<?php
namespace Mezon\Cli\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Cli\Tool;
use Mezon\Fs\Layer;
use Mezon\Conf\Conf;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class CreateHtaccessUnitTest extends TestCase
{

    /**
     * Testing htaccess file creation
     */
    public function testCreateHtaccess(): void
    {
        // setup
        global $argv;
        $argv = [
            'script',
            'create',
            'htaccess'
        ];
        Conf::setConfigValue('fs/layer', 'mock');

        // test body
        Tool::run();

        // assertions
        $this->assertStringContainsString('RewriteEngine on', Layer::$fileData[0]);
        $this->assertStringEndsWith('Entities/../../../../../../.htaccess', Layer::$filePaths[0]);
    }
}

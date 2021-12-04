<?php
namespace Mezon\Cli\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Cli\Tool;
use Mezon\Conf\Conf;
use Mezon\Fs\InMemory;

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
        $content = '';
        if (InMemory::fileExists(dirname(__DIR__) . '\Entities/../../../../../../.htaccess')) {
            $content = InMemory::existingFileGetContents(dirname(__DIR__) . '\Entities/../../../../../../.htaccess');
        } elseif (InMemory::fileExists(dirname(__DIR__) . '/Entities/../../../../../../.htaccess')) {
            $content = InMemory::existingFileGetContents(dirname(__DIR__) . '/Entities/../../../../../../.htaccess');
        }
        $this->assertStringContainsString('RewriteEngine on', $content);
    }
}

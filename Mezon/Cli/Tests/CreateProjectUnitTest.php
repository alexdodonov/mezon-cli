<?php
namespace Mezon\Cli\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Cli\Tool;
use Mezon\Conf\Conf;
use Mezon\Fs\InMemory;
use Mezon\Console\Layer;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class CreateProjectUnitTest extends TestCase
{
    /**
     *
     * {@inheritdoc}
     * @see TestCase::setUp()
     */
    protected function setUp(): void
    {
        global $argv;

        $argv = [
            'script',
            'create',
            'project'
        ];

        Conf::setConfigValue('fs/layer', 'mock');
        Conf::setConfigValue('console/layer', 'mock');
    }

    /**
     * Testing project creation
     */
    public function testCreateProject(): void
    {
        // setup
        Layer::$readlines [] = 'project-name';

        // test body
        ob_start();
        Tool::run();
        ob_end_flush();

        // assertions
        $content = '';
        if (InMemory::fileExists(dirname(__DIR__) . '\Entities/../../../../../../.env')) {
            $content = InMemory::existingFileGetContents(dirname(__DIR__) . '\Entities/../../../../../../.env');
        } elseif (InMemory::fileExists(dirname(__DIR__) . '/Entities/../../../../../../.env')) {
            $content = InMemory::existingFileGetContents(dirname(__DIR__) . '/Entities/../../../../../../.env');
        }
        $this->assertStringContainsString('PROJECT_NAME=project-name', $content);
    }
}

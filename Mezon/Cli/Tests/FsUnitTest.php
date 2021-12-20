<?php
namespace Mezon\Cli\Tests;

use Mezon\Cli\Entities;
use Mezon\Fs;
use Mezon\Console\Layer;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FsUnitTest extends Base
{

    /**
     * Testing fs command
     */
    public function testFs(): void
    {
        // setup
        $this->setCommand([
            'create',
            'fs',
            'folder'
        ]);
        Fs\Layer::$createdDirectories = [];
        // TODO create method Fs\Layer::setExistingDirectory
        Fs\Layer::$createdDirectories[] = [
            'path' => getcwd() . '/folder/Conf',
            'mode' => 0777,
            'recursive' => true
        ];
        Fs\Layer::$createdDirectories[] = [
            'path' => getcwd() . '/folder/ProjectName/Actions',
            'mode' => 0777,
            'recursive' => true
        ];

        Layer::$readlines[] = 'ProjectName';

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->assertStringContainsString('WARNING: Conf already created! (skipping...)', $commandLineOutput);
        $this->assertStringContainsString('WARNING: ProjectName/Actions already created! (skipping...)', $commandLineOutput);
        $this->assertStringContainsString('Created file structure!', $commandLineOutput);

        // all project folder's subfolders were created
        foreach (Entities\Fs::$structureProjectName as $projectFolders) {
            $this->assertTrue(Fs\Layer::directoryExists(getcwd() . '/folder/ProjectName/' . $projectFolders));
        }

        // all root folders were created
        foreach (Entities\Fs::$structure as $rootFolders) {
            $this->assertTrue(Fs\Layer::directoryExists(getcwd() . '/folder/' . $rootFolders));
        }

        // all directories are readable and created in recursive mode
        /** @var array{mode: int, recursive: bool} $directory */
        foreach (Fs\Layer::$createdDirectories as $directory) {
            $this->assertEquals(0777, $directory['mode']);
            $this->assertTrue($directory['recursive']);
        }
    }
}

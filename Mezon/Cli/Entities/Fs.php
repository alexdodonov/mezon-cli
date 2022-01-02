<?php
namespace Mezon\Cli\Entities;

use Mezon\Cli\Interfaces\IEntity;
use Mezon\Fs\Layer;
use Mezon\Console;

/**
 * Handler for creation of the default folder structure
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Fs implements IEntity
{

    /**
     * List of project's directories
     *
     * @var string[]
     */
    public static $structureProjectName = [
        'Actions',
        'ListBuilderAdapters',
        'Logic',
        'Middleware',
        'Models',
        'Presenters',
        'Repositories',
        'Tables',
        'Views'
    ];

    /**
     * List of root directories
     *
     * @var string[]
     */
    public static $structure = [
        'Conf',
        'Include/Js',
        'Include/Php',
        'Res/Images',
        'Testing/Selenium',
        'Testing/Unit'
    ];

    /**
     * Method runs folder structure creation
     */
    public static function run(): void
    {
        global $argv;

        $projectName = Console\Layer::readline('Enter project name: ');

        $baseDir = getcwd();

        if (isset($argv[3])) {
            $baseDir .= "/$argv[3]";
        }

        foreach (static::$structureProjectName as $dir) {
            $filePath = "$baseDir/$projectName/$dir";
            if (Layer::directoryExists($filePath)) {
                echo "WARNING: $projectName/$dir already created! (skipping...)\n";
            } else {
                Layer::createDirectory($filePath, 0777, true);
            }
        }

        foreach (static::$structure as $dir) {
            $filePath = "$baseDir/$dir";
            if (Layer::directoryExists($filePath)) {
                echo "WARNING: $dir already created! (skipping...)\n";
            } else {
                Layer::createDirectory($filePath, 0777, true);
            }
        }

        echo "Created file structure!\n";
    }
}

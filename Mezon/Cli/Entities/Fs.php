<?php
namespace Mezon\Cli\Entities;

use Mezon\Fs\Layer;

/**
 * Handler for creation of the default folder structure
 *
 * @author gdever
 */
class Fs
{

    /**
     * Method runs folder structure creation
     */
    public static function run(): void
    {
        global $argv;

        $project_name = readline('Enter project name: ');

        $structureProjectName = [
            'Actions',
            'ListBuilderAdapters',
            'Logic',
            'Middleware',
            'Models',
            'Presenters',
            'Repositories',
            'Tables',
            'Views',
        ];

        $structure = [
            'Conf',
            'Include/Js',
            'Include/Php',
            'Res/Images',
            'Testing/Selenium',
            'Testing/Unit'
        ];

        $baseDir = getcwd();

        if (isset($argv[3]))
            $baseDir .= "/$argv[3]";

        foreach ($structureProjectName as $dir) {
            $filePath = "$baseDir/$project_name/$dir";
            if (Layer::directoryExists($filePath))
                echo "WARNING: $project_name/$dir already created! (skipping...)\n";
            else
                Layer::createDirectory($filePath, 0777, true);
        }

        foreach ($structure as $dir) {
            $filePath = "$baseDir/$dir";
            if (Layer::directoryExists($filePath))
                echo "WARNING: $dir already created! (skipping...)\n";
            else
                Layer::createDirectory($filePath, 0777, true);
        }

        echo "Created file structure!\n";
    }
}

<?php
namespace Mezon\Cli\Entities;

use Mezon\Fs;
use Mezon\Console;

/**
 * Handler for creation of the project
 *
 * @author gdever
 */
class Project
{

    /**
     * Method runs project creation
     */
    public static function run(): void
    {
        $projectName = Console\Layer::readline('Enter project name: ');

        $env = file_get_contents(__DIR__ . '/../Res/Create/env.tpl');

        $env = str_replace('%project_name%', $projectName, $env);

        Fs\Layer::filePutContents(__DIR__ . '/../../../../../../.env', $env);
    }
}

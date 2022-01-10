<?php
namespace Mezon\Cli\Entities;

use Mezon\Cli\Interfaces\IEntity;
use Mezon\Console;
use Mezon\Fs;

/**
 * Handler for creation of default Application.php file
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Application implements IEntity
{

    /**
     * Method runs Application.php file creation
     */
    public static function run(): void
    {
        $file = getcwd() . '/Application.php';

        if (Fs\Layer::fileExists($file)) {
            echo "WARNING: file Application.php already exists.\n";
            $confirm = Console\Layer::readline('Do you want override it? (y/n) ');
            if ($confirm === 'n')
                return;
        }

        Fs\Layer::filePutContents(
            getcwd() . '/Application.php',
            file_get_contents(__DIR__ . '/../Res/Create/Application.tpl'));

        echo "Application.php created!\n";
    }
}

<?php
namespace Mezon\Cli\Entities;

use Mezon\Fs\Layer;

/**
 * Handler for creation of default Application.php file
 *
 * @author gdever
 */
class Application
{

    /**
     * Method runs Application.php file creation
     */
    public static function run(): void
    {
        $file = getcwd() . '/Application.php';

        if (Layer::fileExists($file)) {
            echo "WARNING: file Application.php already exists.\n";
            $confirm = readline('Do you want override it? (y/n) ');
            if ($confirm === 'n')
                return;
        }

        Layer::filePutContents(
            getcwd() . '/Application.php',
            Layer::fileGetContents(__DIR__ . '/../Res/Create/Application.tpl'));

        echo "Application.php created!\n";
    }
}

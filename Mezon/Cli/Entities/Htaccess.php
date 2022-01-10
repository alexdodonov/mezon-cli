<?php
namespace Mezon\Cli\Entities;

use Mezon\Cli\Interfaces\IEntity;
use Mezon\Console;
use Mezon\Fs;

/**
 * Handler for creation of the default .htaccess file
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Htaccess implements IEntity
{

    /**
     * Method runs htaccess creation
     */
    public static function run(): void
    {
        $file = getcwd() . '/.htaccess';
        if (Fs\Layer::fileExists($file)) {
            echo "WARNING: file .htaccess already exists.\n";
            $confirm = Console\Layer::readline('Do you want override it? (y/n) ');
            if ($confirm === 'n') {
                return;
            }
        }

        // TODO make folowing transformations:
        // replace \ with /
        // collapse /./ into /
        // collapse /../Folder/ into /
        // TODO and then replace file_get_contents with Fs\Layer::fileGetContents
        Fs\Layer::filePutContents($file, file_get_contents(__DIR__ . '/../Res/Create/htaccess.tpl'));

        echo ".htaccess created successfully!\n";
    }
}

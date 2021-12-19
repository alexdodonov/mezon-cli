<?php
namespace Mezon\Cli\Entities;

use Mezon\Fs\Layer;

/**
 * Handler for creation of the default .htaccess file
 *
 * @author gdever
 */
class Htaccess
{

    /**
     * Method runs htaccess creation
     */
    public static function run(): void
    {
        $file = getcwd() . '/.htaccess';
        if (Layer::fileExists($file)) {
            echo "WARNING: file .htaccess already exists.\n";
            $confirm = readline('Do you want override it? (y/n) ');
            if ($confirm === 'n')
                return;
        }

        Layer::filePutContents(
            getcwd() . '/.htaccess',
            Layer::fileGetContents(__DIR__ . '/../Res/Create/htaccess.tpl'));

        echo ".htaccess created successfully!\n";
    }
}

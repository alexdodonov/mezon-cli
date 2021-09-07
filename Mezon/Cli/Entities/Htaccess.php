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
        Layer::filePutContents(
            __DIR__ . '/../../../../../../.htaccess',
            file_get_contents(__DIR__ . '/../Res/Create/htaccess.tpl'));
    }
}

<?php
namespace Mezon\Cli\Doc;

use Mezon\Cli\Interfaces\IEntity;

/**
 * Handler for documentation of the default .htaccess file creation
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Htaccess implements IEntity
{

    /**
     * Method runs documentation for default .htaccess file creation
     */
    public static function run(): void
    {
        echo "Description: basic .htaccess file with rules for your server.\n\n";
        echo "Usage: mezon create htaccess\n";
    }
}

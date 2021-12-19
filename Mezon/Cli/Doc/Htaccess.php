<?php
namespace Mezon\Cli\Doc;

/**
 * Handler for documentation of the default .htaccess file creation
 *
 * @author gdever
 */
class Htaccess
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

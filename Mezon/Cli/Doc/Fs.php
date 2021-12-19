<?php
namespace Mezon\Cli\Doc;

/**
 * Handler for documentation of default folder structure
 *
 * @author gdever
 */
class Fs
{

    /**
     * Method runs documentation for default folder structure creation
     */
    public static function run(): void
    {
        echo "Description: default folder structure will be created.\n\n";
        echo "Usage: mezon create fs\n";
        echo "       mezon create fs [<path>]\n";
    }
}

<?php
namespace Mezon\Cli\Doc;

use Mezon\Cli\Interfaces\IEntity;

/**
 * Handler for documentation of default folder structure
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Fs implements IEntity
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

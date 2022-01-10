<?php
namespace Mezon\Cli\Doc;

use Mezon\Cli\Interfaces\IEntity;

/**
 * Handler for documentation of 'create' verb
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Create implements IEntity
{

    /**
     * Method runs documentation for 'create' verb
     */
    public static function run(): void
    {
        echo "Description: create a basic structure of the entity specified.\n\n";
        echo "Usage: mezon create htaccess\n";
        echo "       mezon create application\n";
        echo "       mezon create fs\n";
    }
}

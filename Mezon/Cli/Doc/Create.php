<?php
namespace Mezon\Cli\Doc;

/**
 * Handler for documentation of 'create' verb
 *
 * @author gdever
 */
class Create
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

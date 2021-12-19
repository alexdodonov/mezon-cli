<?php
namespace Mezon\Cli\Doc;

/**
 * Handler for documentation of creation of default Application.php
 *
 * @author gdever
 */
class Application
{

    /**
     * Method runs documentation for Application.php creation
     */
    public static function run(): void
    {
        echo "Description: basic Application.php file.\n\n";
        echo "Usage: mezon create application\n";
    }
}

<?php
namespace Mezon\Cli\Doc;

use Mezon\Cli\Interfaces\IEntity;

/**
 * Handler for documentation of creation of default Application.php
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class Application implements IEntity
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

<?php
namespace Mezon\Cli\Doc;

use Mezon\Cli\Interfaces\IEntity;

/**
 * Handler for documentation of 'help' verb
 *
 * @author gdever
 *
 * @implements IEntity<int>
 */
class HelpOptions implements IEntity
{

    /**
     * Method runs documentation for 'help' verb
     */
    public static function run(): void
    {
        echo "Usage: mezon help [<option>]\n";
    }
}

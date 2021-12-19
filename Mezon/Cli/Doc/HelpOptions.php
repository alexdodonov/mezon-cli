<?php
namespace Mezon\Cli\Doc;

/**
 * Handler for documentation of 'help' verb
 *
 * @author gdever
 */
class HelpOptions
{

    /**
     * Method runs documentation for 'help' verb
     */
    public static function run(): void
    {
        echo "Usage: mezon help [<option>]\n";
    }
}

<?php
namespace Mezon\Cli;

use Mezon\Cli\Interfaces\IVerb;
use Mezon\Cli\Verbs\ {
    Create,
    Help,
    Version
};

// TODO handle not existing

/**
 * Class for Mezon CLI application $verb2Class and $entity2Class (int Verbs/Create.php)
 *
 * @author gdever
 */
class Tool
{

    /**
     * Hash for verb and class correlation
     *
     * @var array<string, class-string<IVerb>>
     */
    private static $verb2Class = [
        'create' => Create::class,
        'help' => Help::class,
        'version' => Version::class
    ];

    /**
     * Method returns class name for processing verb from the command line
     *
     * @return class-string<IVerb>
     */
    private static function getVerbHandler()
    {
        global $argv;

        if (count($argv) === 1) {
            throw (new \Exception('Verbs not provided!. Try \'mezon help\' for more information.'));
        }

        if (isset(static::$verb2Class[$argv[1]])) {
            return static::$verb2Class[$argv[1]];
        } else {
            throw (new \Exception('The verb "' . $argv[1] . '" was not found'));
        }
    }

    /**
     * Method runs command line application
     */
    public static function run(): void
    {
        static::getVerbHandler()::getCommand()::run();
    }
}

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
     * @return class-string<IVerb>|null
     */
    private static function getVerbHandler(): ?string
    {
        global $argv;

        if (! isset($argv[1])) {
            return static::$verb2Class['help'];
        }

        if (isset(static::$verb2Class[$argv[1]])) {
            return static::$verb2Class[$argv[1]];
        }

        return null;
    }

    /**
     * Method runs command line application
     */
    public static function run(): void
    {
        global $argv;

        if (! $verbHandler = static::getVerbHandler()) {
            echo "The verb \"$argv[1]\" was not found\n";
            return;
        }

        if (! $command = $verbHandler::getCommand()) {
            echo "The entity \"$argv[2]\" was not found\n";
            return;
        }

        $command::run();
    }
}

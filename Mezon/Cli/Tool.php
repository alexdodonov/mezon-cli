<?php
namespace Mezon\Cli;

use Mezon\Cli\Verbs\Create;

/**
 * Class for Mezon CLI application
 *
 * @author gdever
 */
class Tool
{

    /**
     * Hash for verb and class correlation
     *
     * @var array{"create": Create::class}
     */
    private static $verb2Class = [
        'create' => Create::class
    ];

    /**
     * Method returns class name for processing verb from the command line
     *
     * @return Create::class
     */
    private static function getVerbHandler(): string
    {
        global $argv;

        if (isset(static::$verb2Class[$argv[1]])) {
            return static::$verb2Class[$argv[1]];
        } else {
            throw (new \Exception('The verb "' . $argv[1] . '" was not found'));
        }
    }

    /**
     * Method runs command line application
     *
     * @psalm-suppress InvalidStringClass
     */
    public static function run(): void
    {
        static::getVerbHandler()::getCommand()::run();
    }
}

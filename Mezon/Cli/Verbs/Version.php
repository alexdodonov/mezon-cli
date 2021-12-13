<?php
namespace Mezon\Cli\Verbs;

/**
 * Class for processing 'version' verb
 *
 * @author gdever
 */
class Version
{

    /**
     * Method returns class name for processing command from the command line
     */
    public static function getCommand(): string
    {
        return self::class;
    }


    /**
     * Method prints Mezon CLI version
     */
    public static function run(): void
    {
        print "Mezcon CLI 1.0.3\n";
    }
}

<?php
namespace Mezon\Cli\Verbs;

use Mezon\Cli\Interfaces\ {
    IVerb,
    IEntity
};

/**
 * Class for processing 'version' verb
 *
 * @author gdever
 *
 * @implements IVerb<int>
 */
class Version implements IVerb, IEntity
{

    /**
     * Method returns class name for processing command from the command line
     *
     * @return class-string<IEntity>
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
        echo "Mezon CLI 1.0.6\n";
    }
}

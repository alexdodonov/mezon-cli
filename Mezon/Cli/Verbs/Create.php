<?php
namespace Mezon\Cli\Verbs;

use Mezon\Cli\Entities\ {
    Application,
    Fs,
    Htaccess,
    Project
};

use Mezon\Cli\Interfaces\ {
    IVerb,
    IEntity
};

/**
 * Class for processing 'create' verb
 *
 * @author gdever
 *
 * @implements IVerb<int>
 */
class Create implements IVerb
{

    /**
     * Hash for entity and class correlation
     *
     * @var array<string, class-string<IEntity>>
     */
    private static $entity2Class = [
        'application'  =>  Application::class,
        'fs'           =>  Fs::class,
        'htaccess'     =>  Htaccess::class,
        'project'      =>  Project::class
    ];

    /**
     * Method returns class name for processing command from the command line
     *
     * @return class-string<IEntity>
     */
    public static function getCommand()
    {
        global $argv;

        if (isset(static::$entity2Class[$argv[2]])) {
            return static::$entity2Class[$argv[2]];
        } else {
            throw (new \Exception('The entity "' . $argv[2] . '" was not found'));
        }
    }
}

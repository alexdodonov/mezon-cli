<?php
namespace Mezon\Cli\Verbs;

use Mezon\Cli\Entities\Htaccess;
use Mezon\Cli\Entities\Project;

/**
 * Class for processing 'create' verb
 *
 * @author gdever
 */
class Create
{

    /**
     * Hash for entity and class correlation
     *
     * @var array<string, class-string>
     */
    private static $entity2Class = [
        'htaccess' => Htaccess::class,
        'project' => Project::class
    ];

    /**
     * Method returns class name for processing command from the command line
     *
     * @return string
     */
    public static function getCommand(): string
    {
        global $argv;

        if (isset(static::$entity2Class[$argv[2]])) {
            return static::$entity2Class[$argv[2]];
        } else {
            throw (new \Exception('The entity "' . $argv[2] . '" was not found'));
        }
    }
}

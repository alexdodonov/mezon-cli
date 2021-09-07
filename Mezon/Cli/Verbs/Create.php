<?php
namespace Mezon\Cli\Verbs;

use Mezon\Cli\Entities\Htaccess;

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
     * @var array
     */
    private static $entity2Class = [
        'htaccess' => Htaccess::class
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

<?php
namespace Mezon\Cli\Interfaces;

/**
* @template IVerb
*/
interface IVerb {
    /**
     * Method returns class name for processing command from the command line
     *
     * @return class-string<IEntity>|null
     */
    public static function getCommand();
}

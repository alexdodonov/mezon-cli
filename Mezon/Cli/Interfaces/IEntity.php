<?php
namespace Mezon\Cli\Interfaces;

/**
* @template IEntity
*/
interface IEntity {
    /**
     * Method runs the command
     */
    public static function run(): void;
}

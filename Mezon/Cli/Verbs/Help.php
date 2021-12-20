<?php
namespace Mezon\Cli\Verbs;

use Mezon\Cli\Doc\ {
    Application,
    Create,
    Fs,
    HelpOptions,
    Htaccess
};

/**
 * Class for processing 'help' verb
 *
 * @author gdever
 */
class Help
{

    /**
     * Hash for entity/verb and class correlation
     *
     * @var array{"create": Create::class}
     */
    private static $doc2Class = [
        'application' => Application::class,
        'create' => Create::class,
        'fs' => Fs::class,
        'help' => HelpOptions::class,
        'htaccess' => Htaccess::class
    ];

    /**
     * Method returns class name for processing command from the command line
     */
    public static function getCommand(): string
    {
        global $argv;

        if (! isset($argv[2])) {
            return self::class;
        }

        if (isset(static::$doc2Class[$argv[2]])) {
            return static::$doc2Class[$argv[2]];
        }

        return self::class;
    }

    /**
     * Method prints the files in a give path
     */
    private static function list(string $path): void
    {
        foreach (new \DirectoryIterator(__DIR__ . $path) as $file) {
            if ($file->isfile()) {
                $name = explode('.', $file->getFilename())[0];
                echo "  " . strtolower($name) . "\n";
            }
        }
    }

    /**
     * Method prints the usages of the cli
     */
    public static function run(): void
    {
        echo "Usage: mezon <verb> <entity> [<options>]\n\n";
        echo "Verbs:\n";
        self::list('/../Verbs');
        echo "\n";
        echo "Entities:\n";
        self::list('/../Entities');
    }
}

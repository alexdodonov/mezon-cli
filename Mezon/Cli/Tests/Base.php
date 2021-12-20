<?php
namespace Mezon\Cli\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Conf\Conf;
use Mezon\Cli\Tool;
use Mezon\Fs\InMemory;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class Base extends TestCase
{

    /**
     * Method sets command line options
     *
     * @param array $commands
     *            command line options
     */
    protected function setCommand(array $commands): void
    {
        global $argv;
        $argv = array_merge([
            'mezon'
        ], $commands);
    }

    /**
     *
     * {@inheritdoc}
     * @see TestCase::setUp()
     */
    protected function setUp(): void
    {
        Conf::setConfigValue('console/layer', 'mock');
        Conf::setConfigValue('fs/layer', 'mock');

        InMemory::clearFs();
    }

    /**
     * Running test body
     *
     * @return string command line output
     */
    protected function testBody(): string
    {
        ob_start();
        Tool::run();
        $commandLineOutput = ob_get_contents();
        ob_end_clean();

        return $commandLineOutput;
    }

    /**
     * Validating output
     *
     * @param string $commandLineOutput
     * @param string[] $outputValidators
     */
    protected function validateOutput(string $commandLineOutput, array $outputValidators): void
    {
        foreach ($outputValidators as $output) {
            $this->assertStringContainsString($output, $commandLineOutput);
        }
    }

    /**
     * Run validations
     *
     * @param string $fileName
     *            file name to be asserted
     * @param string[] $contentValidators
     *            content validators
     * @param string $commandLineOutput
     *            command line output
     * @param string[] $outputValidators
     *            console output validators
     */
    protected function validate(string $fileName, array $contentValidators, string $commandLineOutput, array $outputValidators): void
    {
        // assertions
        foreach ($contentValidators as $content) {
            $this->assertStringContainsString($content, InMemory::existingFileGetContents(getcwd() . $fileName));
        }

        // asserting output
        $this->validateOutput($commandLineOutput, $outputValidators);
    }
}

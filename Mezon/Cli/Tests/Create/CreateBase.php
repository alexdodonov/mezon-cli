<?php
namespace Mezon\Cli\Tests\Create;

use Mezon\Console;
use Mezon\Fs;
use Mezon\Cli\Tests\Base;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class CreateBase extends Base
{

    /**
     * Test for unexisting creating file
     *
     * @param string $fileName
     *            file name to be asserted
     * @param string[] $contentValidators
     *            content validators
     * @param string[] $outputValidators
     *            console output validators
     */
    protected function createForUnexisting(string $fileName, array $contentValidators, array $outputValidators): void
    {
        // setup
        Fs\Layer::$existingFiles = [];

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validate($fileName, $contentValidators, $commandLineOutput, $outputValidators);
    }

    /**
     * Test for 'create' verb
     *
     * @param string $fileName
     *            file name
     * @param string $answer
     *            answer for prompting
     * @param string[] $contentValidators
     *            file content validators
     * @param string[] $outputValidators
     *            console output validators
     */
    private function createForExistingBase(string $fileName, string $answer, array $contentValidators, array $outputValidators): void
    {
        // setup
        Fs\Layer::$existingFiles[] = getcwd() . $fileName;
        Console\Layer::$readlines[] = $answer;

        // test body
        $commandLineOutput = $this->testBody();

        // assertions
        $this->validate($fileName, $contentValidators, $commandLineOutput, $outputValidators);
    }

    /**
     * Test for existing creating file
     *
     * @param string $fileName
     *            file name to be asserted
     * @param string[] $contentValidators
     *            content validators
     * @param string[] $outputValidators
     *            console output validators
     */
    protected function createForExisting(string $fileName, array $contentValidators, array $outputValidators): void
    {
        $this->createForExistingBase($fileName, 'y', $contentValidators, $outputValidators);
    }

    /**
     * Test for existing creating file
     *
     * @param string $fileName
     *            file name to be asserted
     * @param string[] $contentValidators
     *            content validators
     * @param string[] $outputValidators
     *            console output validators
     */
    protected function createForExistingNotRewrite(string $fileName, array $contentValidators, array $outputValidators): void
    {
        $this->createForExistingBase($fileName, 'n', $contentValidators, $outputValidators);
    }
}

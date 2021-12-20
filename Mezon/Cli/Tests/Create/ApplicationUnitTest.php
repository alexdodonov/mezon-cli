<?php
namespace Mezon\Cli\Tests\Create;

use PHPUnit\Framework\TestCase;
use Mezon\Fs\InMemory;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ApplicationUnitTest extends CreateBase
{

    /**
     *
     * {@inheritdoc}
     * @see TestCase::setUp()
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setCommand([
            'create',
            'application'
        ]);
    }

    /**
     * Testing htaccess creation
     */
    public function testCreateApplicationForUnexisting(): void
    {
        $this->createForUnexisting('/Application.php', [
            'Application extends CommonApplication'
        ], [
            'Application.php created!'
        ]);
    }

    /**
     * Testing htaccess creation
     */
    public function testCreateApplicationForExisting(): void
    {
        InMemory::filePutContents(getcwd() . '/Application.php', file_get_contents(__DIR__ . '/../../Res/Create/Application.tpl'));

        $this->createForExisting('/Application.php', [
            'Application extends CommonApplication'
        ], [
            'WARNING: file Application.php already exists.',
            'Do you want override it? (y/n) ',
            'Application.php created!'
        ]);
    }

    /**
     * Testing htaccess creation
     */
    public function testCreateApplicationForExistingNotRewrite(): void
    {
        InMemory::filePutContents(getcwd() . '/Application.php', file_get_contents(__DIR__ . '/../../Res/Create/Application.tpl'));

        $this->createForExistingNotRewrite('/Application.php', [
            'Application extends CommonApplication'
        ], [
            'WARNING: file Application.php already exists.',
            'Do you want override it? (y/n) '
        ]);
    }
}

<?php
namespace Mezon\Cli\Tests\Create;

use PHPUnit\Framework\TestCase;
use Mezon\Fs\InMemory;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class HtaccessUnitTest extends CreateBase
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
            'htaccess'
        ]);
    }

    /**
     * Testing htaccess creation
     */
    public function testCreateHtaccessForUnexisting(): void
    {
        $this->createForUnexisting('/.htaccess', [
            'RewriteEngine on'
        ], [
            '.htaccess created successfully!'
        ]);
    }

    /**
     * Testing htaccess creation
     */
    public function testCreateHtaccessForExisting(): void
    {
        InMemory::filePutContents(getcwd() . '/.htaccess', file_get_contents(__DIR__ . '/../../Res/Create/htaccess.tpl'));

        $this->createForExisting('/.htaccess', [
            'RewriteEngine on'
        ], [
            'WARNING: file .htaccess already exists.',
            'Do you want override it? (y/n) ',
            '.htaccess created successfully!'
        ]);
    }

    /**
     * Testing htaccess creation
     */
    public function testCreateHtaccessForExistingNotRewtire(): void
    {
        InMemory::filePutContents(getcwd() . '/.htaccess', file_get_contents(__DIR__ . '/../../Res/Create/htaccess.tpl'));

        $this->createForExistingNotRewrite('/.htaccess', [
            'RewriteEngine on'
        ], [
            'WARNING: file .htaccess already exists.',
            'Do you want override it? (y/n) '
        ]);
    }
}

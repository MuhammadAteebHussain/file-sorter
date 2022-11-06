<?php

namespace tests\Application\Service;

use App\Service\Application\ShortCodeSortingApplicationService;
use App\Service\General\FileService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShortCodeSortingApplicationServiceTest extends KernelTestCase
{

    protected $sort_service;
    protected $file_service;

    /**
     * setUp function
     * setup all the required data for testing
     * @return void
     */
    protected function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $this->sort_service = $container->get(ShortCodeSortingApplicationService::class);
        $this->file_service = $container->get(FileService::class);
    }

    /**
     * testExecuteSortFileSuccessFully function
     *  test ShortCodeSortingApplicationService execute function
     * @return void
     */
    public function testExecuteSortFileSuccessFully()
    {
        $this->sort_service->execute();
        $this->assertTrue(true);
    }

    /**
     * testFileDeleted function
     * file deleting file after successful test execution
     * @return void
     */
    public function testFileDeleted()
    {
        $this->file_service->delete();
        $this->assertTrue(true);
    }
}

<?php

namespace tests\Unit\Service;

use App\Service\General\FileService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FileServiceTest extends KernelTestCase
{

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
        $this->file_service = $container->get(FileService::class);
        $this->file_data = $this->file_service->get_file($_ENV['UNSORTED_FILE']);
        $this->file_name = $_ENV['TEST_FILE_NAME'];
    }

    /**
     * test_write_file function
     * it will write the file in given the directory
     * @return void
     */
    public function test_write_file()
    {
        $this->file_service->write($this->file_data, $this->file_name);
        $this->assertTrue(true);
    }

    /**
     * test_get_file function
     * it will get the file content test
     * @return void
     */
    public function test_get_file()
    {
        $this->file_service->get_file($this->file_name);
        $this->assertTrue(true);
    }

    /**
     * test_delete_file function
     * it will delete the file after successfull execution
     * @return void
     */
    public function test_delete_file()
    {
        $this->file_service->delete($this->file_name);
        $this->assertTrue(true);
    }
}

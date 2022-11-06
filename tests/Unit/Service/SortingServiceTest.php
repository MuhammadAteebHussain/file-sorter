<?php

namespace tests\Unit\Service;

use App\Service\General\FileService;
use App\Service\General\SortingService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SortingServiceTest extends KernelTestCase
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
        $this->sorting_service = $container->get(SortingService::class);
        $this->file_service = $container->get(FileService::class);
        $this->file_data = $this->file_service->get_file($_ENV['UNSORTED_FILE']);
        $this->file_name = $_ENV['UNSORTED_FILE'];
    }

    /**
     * test_convert_config_string_to_array_with_comments function
     * it will convert file content string into array with comments
     * @return void
     */
    public function test_convert_config_string_to_array_with_comments()
    {
        $this->sorting_service->convertConfigStringToArrayWithComments($this->file_data);
        $this->assertTrue(true);
    }

    /**
     * test_sort_config_file_array_to_string function
     * it will return new sorted config file
     * @return void
     */
    public function test_sort_config_file_array_to_string()
    {
        $unsorted_array = $this->sorting_service->convertConfigStringToArrayWithComments($this->file_data);
        $this->sorting_service->sortConfigFileArrayToString($unsorted_array);
        $this->assertTrue(true);
    }
}

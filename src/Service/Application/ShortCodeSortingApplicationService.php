<?php

namespace App\Service\Application;

use App\Contract\FileInterface;
use App\Contract\SortingInterface;
use App\Service\Contract\ApplicationServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * ShortCodeSortingApplicationService class
 * @package ApplicationServiceInterface
 * This Application service responsible for the whole sorting mechanism
 */
class ShortCodeSortingApplicationService implements ApplicationServiceInterface
{

    protected SortingInterface $sorting_service;
    protected FileInterface $file_service;
    protected LoggerInterface $logger;


    /**
     * __construct function
     *
     * @param SortingInterface $sorting_service
     * @param FileInterface $file_service
     * @param LoggerInterface $logger
     */
    public function __construct(SortingInterface $sorting_service, FileInterface $file_service, LoggerInterface $logger)
    {
        $this->sorting_service = $sorting_service;
        $this->file_service = $file_service;
        $this->logger = $logger;
    }

    /**
     * execute function
     *
     * @param string $request
     * @return bool
     */
    public function execute($request = ""): bool
    {
        try {
            $short_codes = $this->file_service->get_file($_ENV['UNSORTED_FILE']);
            $short_code_array_with_comments = $this->sorting_service->convertConfigStringToArrayWithComments($short_codes);
            $data = $this->sorting_service->sortConfigFileArrayToString($short_code_array_with_comments);
            return $this->file_service->write($data);
        } catch (\Exception $ex) {
            $this->logger->error($ex);
            return false;
        }
    }
}

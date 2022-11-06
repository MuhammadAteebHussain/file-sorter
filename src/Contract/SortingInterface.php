<?php

namespace App\Contract;

/**
 * SortingService class
 * @package App\Service\General\SortingService
 * @author Ateeb <muhammad_ateeb_hussain@hotmail.com>
 */

interface SortingInterface
{
    public function convertConfigStringToArrayWithComments(string $config_file_string): array;
    public function sortConfigFileArrayToString(array $config_file): string;
}

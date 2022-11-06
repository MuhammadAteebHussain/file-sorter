<?php

namespace App\Contract;

/**
 * FilmService class
 * @package App\Service\General\FilmService
 * @author Ateeb <muhammad_ateeb_hussain@hotmail.com>
 */

interface FileInterface
{
    public function write(string $data, string $file_name = ""): bool;
    public function get_file(string $file_name): string;
}

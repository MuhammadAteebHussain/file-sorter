<?php

namespace App\Service\General;

use App\Contract\FileInterface;

/**
 * FileService class
 * @package App\Contract\FileInterface
 * @author Ateeb <muhammad_ateeb_hussain@hotmail.com>
 */
class FileService  implements FileInterface
{

  protected $file_name;
  protected $path;


  public function __construct()
  {
    $this->file_name = $_ENV['SORTED_FILE'];
    $this->path = $_ENV['CONFIG_FILE_PATH'];
  }


  /**
   * get_file function
   *
   * @param string $file_name
   * @return string
   */
  public function get_file(string $file_name): string
  {
    return file_get_contents($this->path . $file_name);
  }

  /**
   * write function
   *
   * @param string $data
   * @param string $file_name
   * @return boolean
   */
  public function write(string $data, string $file_name = ""): bool
  {
    $new_file_name = $file_name ? $file_name : $this->file_name;
    $creaated = file_put_contents($this->path . $new_file_name, $data);
    return $creaated ? true : false;
  }

  /**
   * delete function
   *
   * @param string $file_name
   * @return boolean
   */
  public function delete(string $file_name = ""): bool
  {
    $new_file_name = $file_name ? $file_name : $this->file_name;
    $delelted = unlink($this->path . $new_file_name);
    return $delelted ? true : false;
  }
}

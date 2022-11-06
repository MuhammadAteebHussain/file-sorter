<?php

namespace App\Service\General;

use App\Contract\SortingInterface;

/**
 * SortingService class
 * @package App\Contract\SortingInterface
 * @author Ateeb <muhammad_ateeb_hussain@hotmail.com>
 */

class SortingService  implements SortingInterface
{

    /**
     * convertConfigStringToArrayWithComments function
     *
     * @param string $config_file_string
     * @return array
     */
    public function convertConfigStringToArrayWithComments(string $config_file_string): array
    {
        $config_list = explode(PHP_EOL, $config_file_string);
        $comment_found = false;
        $comments = array();
        $new_content = array();
        //list of all config and break line
        foreach ($config_list as $i => $config) {
            //detect comments and if comment_found found so store it into an array and set comment_found bit value true
            if (strpos($config, '#', 0) === 0) {
                // do comment_found value true
                $comment_found = true;
                //store comment_found in an array until new line found
                $comments[] = $config;
            } else {
                // make comment_found value false because new line started with keys
                $comment_found = false;
                if ($comment_found !== true) {
                    // as per key append comments
                    $new_content[$i]['comments'] = $comments;
                    //create array of keys
                    $new_content[$i]['keys'] = $config;
                    //after append comment make it null for any other key
                    $comments = [];
                }
            }
        }
        return $new_content;
    }

    /**
     * sortConfigFileArrayToString function
     *
     * @param array $config_file
     * @return string
     */
    public function sortConfigFileArrayToString(array $config_file): string
    {
        usort($config_file, array($this, 'compareByKeys'));
        $content = "";
        foreach ($config_file as $my_content) {
            foreach ($my_content['comments'] as $comment) {
                $content .= $comment . "\r\n";
            }
            $content .= $my_content['keys'] . "\r\n";
        }
        return $content;
    }


    /**
     * compareByKeys function
     *
     * @param array $a
     * @param array $b
     * @return bool
     */
    public function compareByKeys(array $a, array $b) : bool
    {
        return strcmp($a["keys"], $b["keys"]);
    }
}

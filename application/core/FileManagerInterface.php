<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 04.03.18
 * Time: 20:12
 */

namespace Core;

/**
 * Interface FileManagerInterface
 * @package Core
 */
interface FileManagerInterface
{
    /**
     * @param array $files
     * @return string
     */
    function save($files);
}
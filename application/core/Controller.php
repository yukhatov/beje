<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 03.03.18
 * Time: 15:31
 */

namespace Core;


/**
 * Class Controller
 * @package Core
 */
class Controller
{
    /**
     * @var ViewInterface
     */
    public $view;
    /**
     * @var FileManagerInterface
     */
    public $fileManager;

    /**
     * Controller constructor.
     * @param ViewInterface $view
     * @param FileManagerInterface $fileManager
     */
    function __construct(ViewInterface $view, FileManagerInterface $fileManager)
    {
        $this->view = $view;
        $this->fileManager = $fileManager;
    }
}
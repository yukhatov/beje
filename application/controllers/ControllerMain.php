<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 03.03.18
 * Time: 15:52
 */

namespace Controllers;

use Core\Controller;
use Models\ModelTask;

/**
 * Class ControllerMain
 * @package Controllers
 */
class ControllerMain extends Controller
{
    /**
     * @return string
     */
    function actionIndex()
    {
        return $this->view->generate(
            'mainView.php',
            'templateView.php',
            ['tasks' =>(new ModelTask())->findAll(), 'error' => isset($_GET['error']) ? $_GET['error'] : '']
        );
    }

    /**
     * @return string
     */
    function actionInfo()
    {
        phpinfo();
    }

    /**
     *Creates new task
     */
    function actionCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imageName = $this->fileManager->save($_FILES);

            $_POST['image'] = $imageName;
            $task = new ModelTask();

            if ($task->load($_POST)) {
                if ($task->create()) {
                    return header('Location: index.php?route=main/index');        
                }
            }

            return header('Location: index.php?route=main/index&error=All+fields+required');
        }

        return header('Location: index.php?route=404');
    }
}
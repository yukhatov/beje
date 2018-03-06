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

class ControllerAdmin  extends Controller
{
    function actionIndex()
    {
        if (!$this->isLoggedIn()) {
            return header('Location: index.php?route=login/index');
        }

        return $this->view->generate(
            'adminView.php',
            'templateView.php',
            (new ModelTask())->findAll()
        );
    }

    function actionEdit()
    {
        if (!$this->isLoggedIn()) {
            return header('Location: index.php?route=login/index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = new ModelTask();

            $task->update($_POST);

            return header('Location: index.php?route=admin/index');
        }

        return header('Location: index.php?route=admin/index');
    }

    private function isLoggedIn()
    {
        session_start();

        if (isset($_SESSION['login_user']) and $_SESSION['login_user'] == 'admin') {
            return true;
        }

        return false;
    }
}
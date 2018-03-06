<?php
/**
 * Created by PhpStorm.
 * User: littleprince
 * Date: 03.03.18
 * Time: 15:52
 */

namespace Controllers;

use Core\Controller;

class ControllerLogin  extends Controller
{
    function actionIndex()
    {
        return $this->view->generate(
            'loginView.php',
            'templateView.php'
        );
    }

    function actionLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['username'] == 'admin' && $_POST['pass'] == '123') {
                session_start();

                $_SESSION['login_user'] = $_POST['username'];

                return header('Location: index.php?route=admin/index');
            } else {
                return header('Location: index.php?route=login/index');
            }
        }

        return header('Location: index.php?route=login/index');
    }
}
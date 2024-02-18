<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use JetBrains\PhpStorm\NoReturn;

/**
 * The Task controller class.
 *
 * @package App\Controllers
 */
class UserController extends Controller implements UserInterface
{
    /**
     * @var User
     */
    private User $user;

    /**
     * The UserController constructor.
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * The login page.
     *
     * @return void
     */
    public function login(): void
    {
        include_once(__DIR__ . '/../../templates/login.php');
    }

    /**
     * Logs out the user.
     *
     * @return void
     */
    #[NoReturn] public function logout(): void
    {
        session_destroy();
        header("Location:/login?logout=true");
        exit();
    }

    /**
     * Authenticates the user.
     *
     * @return void
     */
    #[NoReturn] public function authenticate(): void
    {
        $user = $this->user->getUserByUsernameAndPassword($_POST['username'], $_POST['password']);
        if (isset($user->id)) {
            if (password_verify($_POST['password'], $user->password) === true) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->username;
                header("Location:/");
                exit();
            } else {
                header("Location:/login?error=true");
                exit();
            }
        } else {
            header("Location:/login?error=true");
            exit();
        }
    }
}
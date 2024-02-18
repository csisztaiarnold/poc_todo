<?php

namespace App\Controllers;

/**
 * The User interface.
 *
 * @package App\Controllers
 */
interface UserInterface
{
    public function login(): void;

    public function logout(): void;

    public function authenticate(): void;
}
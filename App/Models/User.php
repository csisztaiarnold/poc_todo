<?php

namespace App\Models;

use Core\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Query\Builder;

/**
 * The User model class.
 *
 * Interacts with the User data layer.
 *
 * @package App\Models
 */
class User extends Model
{
    /**
     * @var Capsule
     */
    private Capsule $capsule;

    /**
     * The Task Model constructor.
     */
    public function __construct()
    {
        $this->capsule = new Capsule();
        $this->dBConnection();
    }

    /**
     * Gets a user by username.
     *
     * @param string $username Username.
     * @param string $password Password.
     * @return \Illuminate\Database\Eloquent\Model|Builder|object|null
     */
    public function getUserByUsernameAndPassword(string $username, string $password)
    {
        return $this->capsule
            ->table('users')
            ->where('username', $username)
            ->first();
    }
}
<?php

error_reporting(E_ALL ^ E_DEPRECATED);

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Model;
use Faker\Factory as Faker;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

/**
 * The Install class.
 */
class Install extends Model
{
    /**
     * The Capsule class.
     *
     * @var Capsule
     */
    private Capsule $capsule;

    /**
     * The Faker class.
     *
     * @var Faker
     */
    private Faker $faker;

    /**
     * The Install class constructor.
     */
    public function __construct()
    {
        $this->capsule = new Capsule();
        $this->faker = new Faker();
        $this->dBConnection();
    }

    /**
     * Installs the project.
     */
    public function install()
    {
        $this->createUsersTable();
        $this->createTasksTable();
        $this->createUsersTasksTable();
        echo 'The project is installed. <a href="/" title="Home">Go to the index page.</a>';
    }

    /**
     * Creates a "users" table.
     */
    public function createUsersTable()
    {
        $this->capsule->schema()->dropIfExists('users');

        $this->capsule->schema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 1000);
            $table->string('password', 1000);
        });

        $this->capsule->table('users')->truncate();

        $faker = $this->faker->create();

        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $hashed_password = password_hash('password', PASSWORD_DEFAULT);
            $data[] = [
                'username' => $faker->userName(),
                'password' => $hashed_password,
            ];
        }

        $chunks = array_chunk($data, 100);
        foreach ($chunks as $chunk) {
            $this->capsule->table('users')->insert($chunk);
        }
    }

    /**
     * Creates a "tasks" table.
     */
    public function createTasksTable()
    {
        $this->capsule->schema()->dropIfExists('tasks');

        $this->capsule->schema()->create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 1000);
            $table->string('category', 1000);
            $table->string('status', 1000);
            $table->string('due_date', 1000);
            $table->string('last_modification', 1000);
        });

        $this->capsule->table('tasks')->truncate();

        $faker = $this->faker->create();

        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $category = ['mind', 'body', 'medical',];
            $due_date = new DateTime('+' . rand(0, 96) . ' hours');
            $data[] = [
                'title' => $faker->sentence(),
                'category' => $category[rand(0,2)],
                'status' => 'pending',
                'last_modification' => time(),
                'due_date' => $due_date->format('U'),
            ];
        }

        $chunks = array_chunk($data, 100);
        foreach ($chunks as $chunk) {
            $this->capsule->table('tasks')->insert($chunk);
        }
    }

    /**
     * Creates a "users_tasks" relationship table.
     */
    public function createUsersTasksTable()
    {
        $this->capsule->schema()->dropIfExists('users_tasks');

        $this->capsule->schema()->create('users_tasks', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->default(1);
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('task_id')->default(1);
            $table->index('task_id');
            $table->foreign('task_id')->references('id')->on('tasks');
        });

        $this->capsule->table('users_tasks')->truncate();

        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $user_id = rand(1, 10);
            $data[] = [
                'user_id' => $user_id,
                'task_id' => $i,
            ];
        }

        $chunks = array_chunk($data, 100);
        foreach ($chunks as $chunk) {
            $this->capsule->table('users_tasks')->insert($chunk);
        }
    }
}

$install = new Install();
$install->install();

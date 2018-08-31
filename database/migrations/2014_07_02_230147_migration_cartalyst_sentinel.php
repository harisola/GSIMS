<?php

/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Sentinel
 * @version    2.0.15
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2017, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MigrationCartalystSentinel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('activations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::connection('mysql')->create('persistences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code');
        });

        Schema::connection('mysql')->create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code');
            $table->boolean('completed')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::connection('mysql')->create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
            $table->text('permissions')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('slug');
        });

        Schema::connection('mysql')->create('role_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->nullableTimestamps();

            $table->engine = 'InnoDB';
            $table->primary(['user_id', 'role_id']);
        });

        Schema::connection('mysql')->create('throttle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('type');
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->index('user_id');
        });

        Schema::connection('mysql')->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->text('permissions')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('is_active')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('email');
        });











        /********************************************* Seeding *********************************************/
        /***************************************************************************************************/
        /*************************************************************************** User + Activation *****/
        DB::connection('mysql')->table('users')->insert([
            [
                'email' => 'a.naseem@generations.edu.pk',
                'password' => '$2y$10$WSCVGnJAbQkuyRdsjShzxOipRny6reOiE818aYU83WyF7FVvOYb6m',
                'last_login' => date("Y-m-d H:i:s"),
                'first_name' => 'Atif',
                'last_name' => 'Naseem',
                'is_active' => 1,
                'created_at' => '2017-07-05 08:09:58',
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
        DB::connection('mysql')->table('activations')->insert([
            [
                'user_id' => 1,
                'code' => '35h8aDTsYb8bQVg16OqXVuwWR4W2l14L',
                'completed' => 1,
                'completed_at' => '2017-07-05 08:09:58',
                'created_at' => '2017-07-05 08:09:58',
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);


        /*************************************************************************** Role + User Role *****/
        DB::connection('mysql')->table('roles')->insert([
            [
                'slug' => 'Admin',
                'name' => 'Admin',
                'permissions' => 'Super Admin will have all access.',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);

        DB::connection('mysql')->table('role_users')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->drop('activations');
        Schema::connection('mysql')->drop('persistences');
        Schema::connection('mysql')->drop('reminders');
        Schema::connection('mysql')->drop('roles');
        Schema::connection('mysql')->drop('role_users');
        Schema::connection('mysql')->drop('throttle');
        Schema::connection('mysql')->drop('users');
    }
}

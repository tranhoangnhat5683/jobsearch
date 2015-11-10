<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();
        // Quai, cho nay sao no khong auto require file nay cho minh?
        // Dung lenh de tao file ma?
        require __DIR__ . '/JokesTableSeeder.php';
        require __DIR__ . '/UsersTableSeeder.php';
        $this->call(JokesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
    }

}
<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'role_id' => 1,
          'name' => 'Mehedi Hasan',
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'fecha_nacimiento' => '2021-09-19',
          'password' => bcrypt('00000000')
        ]);

      DB::table('users')->insert([
        'role_id' => 2,
        'name' => 'Zannatun Nyma',
        'username' => 'user',
        'email' => 'author@gmail.com',
        'fecha_nacimiento' => '2021-09-19',
        'password' => bcrypt('00000000')
      ]);
    }
}
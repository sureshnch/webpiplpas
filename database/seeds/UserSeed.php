<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$3bpUIl0wc820d/mnHAEZIeXJXXKUXHqdXXUyNPYlezzthI.LsZBue', 'remember_token' => '', 'approved' => 1, 'created_by_id' => null,],
            ['id' => 2, 'name' => 'vendor', 'email' => 'vendor@vendor.com', 'password' => '$2y$10$dbrLg2KpPY.GlCj1gyj2ke5OQyb7WrUu1xkHXGC/roUl7T.P7oZ8S', 'remember_token' => null, 'approved' => 1, 'created_by_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}

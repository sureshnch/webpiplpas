<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)', 'created_by_id' => null,],
            ['id' => 2, 'title' => 'Simple user', 'created_by_id' => null,],
            ['id' => 3, 'title' => 'Freelancer', 'created_by_id' => null,],
            ['id' => 4, 'title' => 'Vendor', 'created_by_id' => null,],
            ['id' => 5, 'title' => 'Recruiter', 'created_by_id' => null,],
            ['id' => 6, 'title' => 'Client', 'created_by_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}

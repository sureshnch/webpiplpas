<?php

use Illuminate\Database\Seeder;

class RoleSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'permission' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55],
            ],
            2 => [
                'permission' => [],
            ],
            3 => [
                'permission' => [21, 22, 23, 24, 31, 32, 33, 34, 36, 41, 42, 43, 44, 46, 49, 51, 52, 53, 54],
            ],
            4 => [
                'permission' => [1, 2, 3, 4, 5, 11, 14, 21, 22, 23, 24, 25, 26, 31, 32, 33, 34, 35, 46, 49, 51, 52, 53, 54, 55],
            ],
            5 => [
                'permission' => [21, 23, 24, 31, 32, 33, 34, 35, 46, 49, 51, 52, 53, 54, 55],
            ],
            6 => [
                'permission' => [1, 2, 3, 4, 5, 11, 14, 16, 46, 47, 48, 49, 50],
            ],

        ];

        foreach ($items as $id => $item) {
            $role = \App\Role::find($id);

            foreach ($item as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }
    }
}

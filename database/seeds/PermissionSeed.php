<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access', 'created_by_id' => null,],
            ['id' => 2, 'title' => 'user_management_create', 'created_by_id' => null,],
            ['id' => 3, 'title' => 'user_management_edit', 'created_by_id' => null,],
            ['id' => 4, 'title' => 'user_management_view', 'created_by_id' => null,],
            ['id' => 5, 'title' => 'user_management_delete', 'created_by_id' => null,],
            ['id' => 6, 'title' => 'permission_access', 'created_by_id' => null,],
            ['id' => 7, 'title' => 'permission_create', 'created_by_id' => null,],
            ['id' => 8, 'title' => 'permission_edit', 'created_by_id' => null,],
            ['id' => 9, 'title' => 'permission_view', 'created_by_id' => null,],
            ['id' => 10, 'title' => 'permission_delete', 'created_by_id' => null,],
            ['id' => 11, 'title' => 'role_access', 'created_by_id' => null,],
            ['id' => 12, 'title' => 'role_create', 'created_by_id' => null,],
            ['id' => 13, 'title' => 'role_edit', 'created_by_id' => null,],
            ['id' => 14, 'title' => 'role_view', 'created_by_id' => null,],
            ['id' => 15, 'title' => 'role_delete', 'created_by_id' => null,],
            ['id' => 16, 'title' => 'user_access', 'created_by_id' => null,],
            ['id' => 17, 'title' => 'user_create', 'created_by_id' => null,],
            ['id' => 18, 'title' => 'user_edit', 'created_by_id' => null,],
            ['id' => 19, 'title' => 'user_view', 'created_by_id' => null,],
            ['id' => 20, 'title' => 'user_delete', 'created_by_id' => null,],
            ['id' => 21, 'title' => 'task_status_access', 'created_by_id' => null,],
            ['id' => 22, 'title' => 'task_status_create', 'created_by_id' => null,],
            ['id' => 23, 'title' => 'task_status_edit', 'created_by_id' => null,],
            ['id' => 24, 'title' => 'task_status_view', 'created_by_id' => null,],
            ['id' => 25, 'title' => 'task_status_delete', 'created_by_id' => null,],
            ['id' => 26, 'title' => 'task_management_access', 'created_by_id' => null,],
            ['id' => 27, 'title' => 'task_management_create', 'created_by_id' => null,],
            ['id' => 28, 'title' => 'task_management_edit', 'created_by_id' => null,],
            ['id' => 29, 'title' => 'task_management_view', 'created_by_id' => null,],
            ['id' => 30, 'title' => 'task_management_delete', 'created_by_id' => null,],
            ['id' => 31, 'title' => 'task_tag_access', 'created_by_id' => null,],
            ['id' => 32, 'title' => 'task_tag_create', 'created_by_id' => null,],
            ['id' => 33, 'title' => 'task_tag_edit', 'created_by_id' => null,],
            ['id' => 34, 'title' => 'task_tag_view', 'created_by_id' => null,],
            ['id' => 35, 'title' => 'task_tag_delete', 'created_by_id' => null,],
            ['id' => 36, 'title' => 'task_access', 'created_by_id' => null,],
            ['id' => 37, 'title' => 'task_create', 'created_by_id' => null,],
            ['id' => 38, 'title' => 'task_edit', 'created_by_id' => null,],
            ['id' => 39, 'title' => 'task_view', 'created_by_id' => null,],
            ['id' => 40, 'title' => 'task_delete', 'created_by_id' => null,],
            ['id' => 41, 'title' => 'task_calendar_access', 'created_by_id' => null,],
            ['id' => 42, 'title' => 'task_calendar_create', 'created_by_id' => null,],
            ['id' => 43, 'title' => 'task_calendar_edit', 'created_by_id' => null,],
            ['id' => 44, 'title' => 'task_calendar_view', 'created_by_id' => null,],
            ['id' => 45, 'title' => 'task_calendar_delete', 'created_by_id' => null,],
            ['id' => 46, 'title' => 'requirement_access', 'created_by_id' => null,],
            ['id' => 47, 'title' => 'requirement_create', 'created_by_id' => null,],
            ['id' => 48, 'title' => 'requirement_edit', 'created_by_id' => null,],
            ['id' => 49, 'title' => 'requirement_view', 'created_by_id' => null,],
            ['id' => 50, 'title' => 'requirement_delete', 'created_by_id' => null,],
            ['id' => 51, 'title' => 'resume_access', 'created_by_id' => null,],
            ['id' => 52, 'title' => 'resume_create', 'created_by_id' => null,],
            ['id' => 53, 'title' => 'resume_edit', 'created_by_id' => null,],
            ['id' => 54, 'title' => 'resume_view', 'created_by_id' => null,],
            ['id' => 55, 'title' => 'resume_delete', 'created_by_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}

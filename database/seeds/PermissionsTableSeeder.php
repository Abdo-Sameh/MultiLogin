<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'create',
                'display_name' => 'Create',
                'description' => 'Allow user to create a new DB record'
            ],
            [
                'name' => 'edit',
                'display_name' => 'Edit',
                'description' => 'Allow user to edit a DB record'
            ],
            [
                'name' => 'read',
                'display_name' => 'Read',
                'description' => 'Allow user to read DB records'
            ],
            [
                'name' => 'delete',
                'display_name' => 'Delete',
                'description' => 'Allow user to delete a DB record'
            ]
        ];
        foreach ($permissions as $key => $value){
            Permission::create($value);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Model::unguard();
         $this->call(UsersTypeTableSeeder::class);
         $this->call(DepartmentTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventTypeTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SubsTableSeeder::class);
    }
}

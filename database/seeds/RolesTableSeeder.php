<?php


use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('roles')->insert(
                        array(
                               array(
					    			'name'=>'Admin',
                                    'label'=>'Admin of the sys',   
					    			)
                    ));

		}

}
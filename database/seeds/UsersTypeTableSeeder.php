<?php


use Illuminate\Database\Seeder;


class UsersTypeTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('user_type')->insert(
                        array(
                               array(
					    			
					    			'type_name'=>'Dept Admin'
					    			),
                               array(
                                    
                                    'type_name'=>'Student'
                                    ),
                               array(
                                    
                                    'type_name'=>'Super Admin'
                                    )
                    ));

		}

}
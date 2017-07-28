<?php


use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('users')->insert(
                        array(
                               array(
					    			'name'=>'CSE Dept Head',
					    			'email'=>'admin@web.com',
					    			'password'=>  Hash::make('1234'),
					    			'contact'=>'01760',
					    			'dept_id'=>'1',
					    			'user_type'=>'1'
					    			),
                                array(
                                    'name'=>'Md. Masum',
                                    'email'=>'super_admin@web.com',
                                    'password'=>  Hash::make('1234'),
                                    'contact'=>'01760',
                                    'dept_id'=>'1',
                                    'user_type'=>'3'
                                    ),
                                array(
                                    'name'=>'Dhruba',
                                    'email'=>'student@web.com',
                                    'password'=>  Hash::make('1234'),
                                    'contact'=>'01760',
                                    'dept_id'=>'1',
                                    'user_type'=>'2'
                                    )
                    ));

		}

}
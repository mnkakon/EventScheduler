<?php


use Illuminate\Database\Seeder;


class DepartmentTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('department')->insert(
                        array(
                               array(
					    			'dept_code'=>'CSE',
					    			'dept_name'=>'Computer Science and Engineering'
					    			),
                              array(
                                    'dept_code'=>'EEE',
                                    'dept_name'=>'Electrical  and Engineering'
                                    )
                    ));

		}

}
<?php


use Illuminate\Database\Seeder;


class CourseTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('course')->insert(
                        array(
                               array(
					    			'course_code'=>'as',
                                    'course_name'=>'dv',
                                    'offering_dept'=>'dvsvdv',
                                    'accepting_dept'=>'assigndvdment'                                    
					    			)
                    ));

		}

}
<?php


use Illuminate\Database\Seeder;


class SubsTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('subscription')->insert(
                        array(
                               array(
					    			'user_id'=>'3',
                                    'event_id'=>'1'
					    			),
                               array(
                                    'user_id'=>'3',
                                    'event_id'=>'2'
                                    ),
                               array(
                                    'user_id'=>'3',
                                    'event_id'=>'3'
                                    ),
                               array(
                                    'user_id'=>'3',
                                    'event_id'=>'4'
                                    ),
                    ));

		}

}
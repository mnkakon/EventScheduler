<?php


use Illuminate\Database\Seeder;


class EventTypeTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('event_type')->insert(
                        array(
                               array(
					    			'event_type'=>'Examination'
					    			),
                               array(
                                    'event_type'=>'Event'
                                    )
                    ));

		}

}
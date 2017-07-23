<?php


use Illuminate\Database\Seeder;


class EventTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('event')->insert(
                        array(
                               array(
					    			'title'=>'Bio Theory Final',
                                    'description'=>'asfdfsdafsd',
                                    'imagelink'=>'3.jpg',
                                    'counter_type'=>'0',
                                    'priority'=>'1',
                                    'status'=>'0',
                                    'start_time'=>'2017-01-01 13:00:00',
                                    'end_time'=>'2017-05-15 02:00:00',
                                    'user_id'=>'1',
                                    'offering_dept'=>'1',
                                    'accepting_dept'=>'1',
                                    'event_type'=>'1',
                                    'course_id'=>'1'
					    			),
                               array(
                                    'title'=>'DSP Exam',
                                    'description'=>'asfdfsdafsd',
                                    'imagelink'=>'2.jpg',
                                    'counter_type'=>'0',
                                    'priority'=>'1',
                                    'status'=>'0',
                                    'event_type'=>'1',
                                    'start_time'=>'2017-01-01 13:00:00',
                                    'end_time'=>'2017-08-03 09:00:00',
                                    'user_id'=>'1',
                                    'offering_dept'=>'1',
                                    'accepting_dept'=>'1',
                                    'course_id'=>'1'

                                    ),
                               array(
                                    'title'=>'EEE Day',
                                    'description'=>'assignment',
                                    'imagelink'=>'slide1.jpg',
                                    'counter_type'=>'0',
                                    'priority'=>'2',
                                    'event_type'=>'2',
                                    'status'=>'0',
                                    'start_time'=>'2017-02-01 02:00:00',
                                    'end_time'=>'2017-07-01 02:02:00',
                                    'user_id'=>'1',
                                    'offering_dept'=>'1',
                                    'accepting_dept'=>'2',
                                    'course_id'=>'1'
                                    ),
                               array(
                                    'title'=>'Bio Lab Exam',
                                    'description'=>'assignment',
                                    'imagelink'=>'5.jpg',
                                    'counter_type'=>'0',
                                    'priority'=>'1',
                                    'status'=>'0',
                                    'event_type'=>'1',
                                    'start_time'=>'2017-03-01 01:00:00',
                                    'end_time'=>'2017-12-02 01:01:00',
                                    'user_id'=>'1',
                                    'offering_dept'=>'1',
                                    'accepting_dept'=>'1',
                                    'course_id'=>'1'
                                    ),
                               array(
                                    'title'=>'CSE General Meeting',
                                    'description'=>'assignment',
                                    'imagelink'=>'1.jpg',
                                    'counter_type'=>'0',
                                    'priority'=>'3',
                                    'status'=>'0',
                                    'event_type'=>'2',
                                    'start_time'=>'2017-03-01 01:00:00',
                                    'end_time'=>'2018-01-02 14:00:00',
                                    'user_id'=>'1',
                                    'offering_dept'=>'1',
                                    'accepting_dept'=>'1',
                                    'course_id'=>'1'
                                    ),
                               array(
                                    'title'=>'EEE Iftar Mahfil ',
                                    'description'=>'assignment',
                                    'imagelink'=>'header_bg.jpg',
                                    'counter_type'=>'0',
                                    'priority'=>'3',
                                    'status'=>'0',
                                    'event_type'=>'2',
                                    'start_time'=>'2017-03-01 01:00:00',
                                    'end_time'=>'2017-05-28 01:01:00',
                                    'user_id'=>'1',
                                    'offering_dept'=>'2',
                                    'accepting_dept'=>'2',
                                    'course_id'=>'1'
                                    )
                    ));

		}

}
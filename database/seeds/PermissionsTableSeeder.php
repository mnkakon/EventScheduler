<?php


use Illuminate\Database\Seeder;


class PermissionsTableSeeder extends Seeder
{
    /**UsersTableSeeder
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


                    DB::table('permissions')->insert(
                        array(
                               array(
					    			'name'=>'edit_topic',
                                    'label'=>'Admin can edit ',   
					    			)
                    ));

		}

}
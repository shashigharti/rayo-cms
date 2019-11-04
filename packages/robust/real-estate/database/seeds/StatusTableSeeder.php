<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array(
            array('id' => '1','status' => 'Untouched','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','status' => 'Assigned','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','status' => 'Attempted Contact','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','status' => 'Contacted','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','status' => 'Appt. Set','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','status' => 'Showing','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','status' => 'Under Contract','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','status' => 'Sold','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','status' => 'Ignore (not ready)','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','status' => 'Discard','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','status' => 'Responded','created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','status' => 'Discard - Has Realtor','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','status' => 'Discard - Duplicate','created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','status' => 'Discard - By Request','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','status' => 'Discard - Invalid Info','created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','status' => 'Discard - Not Worthwhile','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','status' => 'Current Client','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','status' => 'Ignore - Not Ready','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','status' => 'Strong Prospect','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','status' => 'Closed Sale','created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','status' => 'Discard - No Response','created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','status' => 'Referred Elsewhere','created_at' => NULL,'updated_at' => NULL)
        );
        DB::table('statuses')->insert($statuses);
    }
}

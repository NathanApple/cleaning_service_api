<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'task_location' => 'Toilet lantai 1',
            'task_code' => '11111',
            'task_category' => 'rutin',
        ]);

        DB::table('zonings')->insert([
            'zoning_name' => 'Wastafel',
            'task_id' => '1',
        ]);

        DB::table('zonings')->insert([
            'zoning_name' => 'Toilet',
            'task_id' => '1',
        ]);

        DB::table('zoning_details')->insert([
            'detail_title' => 'Bersihkan Wastafel',
            'zoning_id' => '1',
        ]);     

        DB::table('checklists')->insert([
            'checklist_title' => 'Pipa',
            'zoning_detail_id' => '1',
        ]);     

        DB::table('checklists')->insert([
            'checklist_title' => 'Keran',
            'zoning_detail_id' => '1',
        ]);  

        DB::table('checklists')->insert([
            'checklist_title' => 'Cermin',
            'zoning_detail_id' => '1',
        ]);  


        DB::table('zoning_details')->insert([
            'detail_title' => 'Bersihkan Toilet',
            'zoning_id' => '2',
        ]);     

        DB::table('checklists')->insert([
            'checklist_title' => 'Toilet',
            'zoning_detail_id' => '2',
        ]);  

        DB::table('checklists')->insert([
            'checklist_title' => 'Pipa Toilet',
            'zoning_detail_id' => '2',
        ]);  

        // #############

        DB::table('tasks')->insert([
            'task_location' => 'Jendela Ruang Tamu',
            'task_code' => '',
            'task_category' => 'tambahan',
        ]);

        DB::table('zonings')->insert([
            'zoning_name' => 'Jendela Ruang Tamu',
            'task_id' => '2',
        ]);

        DB::table('zoning_details')->insert([
            'detail_title' => 'Jendela Ruang Tamu',
            'zoning_id' => '3',
        ]);   

        DB::table('checklists')->insert([
            'checklist_title' => 'Kaca depan',
            'zoning_detail_id' => '3',
        ]);  

        DB::table('checklists')->insert([
            'checklist_title' => 'Kaca Belakang',
            'zoning_detail_id' => '3',
        ]);  


    }
}

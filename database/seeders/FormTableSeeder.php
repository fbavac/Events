<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('forms')->insert([
            'label' => 'Name',
            'html_field' => 'text',
            'options' => null,
            'comments' => 'Text box for enter name',

        ]);
        DB::table('forms')->insert([
            'label' => 'Phone',
            'html_field' => 'number',
            'options' => null,
            'comments' => 'Phone number field',

        ]);
        DB::table('forms')->insert([
            'label' => 'Gender',
            'html_field' => 'select',
            'options' => 'Male,Female,Other',
            'comments' => 'Gender Select',

        ]);
        DB::table('forms')->insert([
            'label' => 'Age',
            'html_field' => 'number',
            'options' => null,
            'comments' => 'Age Field',

        ]);
         DB::table('forms')->insert([
            'label' => 'Qualification',
            'html_field' => 'select',
            'options' => '10,+2,UG,PG',
            'comments' => 'Qualification select',

        ]);
    }
}

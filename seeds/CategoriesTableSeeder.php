<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\Category;
use Illuminate\Database\Seeder;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = json_decode(file_get_contents(__dir__ . '/json/categories.json'));

        foreach ($records as $record){
            $account = new Category();
            $account->name = $record->name;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('categories', 'id'), MAX(id)) FROM categories;"));
    }
}

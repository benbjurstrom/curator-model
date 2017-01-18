<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\KeywordType;
use Illuminate\Database\Seeder;
use DB;

class KeywordTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = json_decode(file_get_contents(__dir__ . '/json/keyword-types.json'));

        foreach ($records as $record){
            $account = new KeywordType;
            $account->id = $record->id;
            $account->name = $record->name;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('keyword_types', 'id'), MAX(id)) FROM keyword_types;"));
    }
}

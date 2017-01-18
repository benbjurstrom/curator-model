<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\EntityKeyword;
use Illuminate\Database\Seeder;
use DB;

class EntityKeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = json_decode(file_get_contents(__dir__ . '/json/entity-keywords.json'));

        foreach ($records as $record){
            $account = new EntityKeyword;
            $account->id = $record->id;
            $account->entity_id = $record->entity_id;
            $account->keyword = $record->keyword;
            $account->keyword_type_id = $record->keyword_type_id;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('entity_keywords', 'id'), MAX(id)) FROM entity_keywords;"));
    }
}

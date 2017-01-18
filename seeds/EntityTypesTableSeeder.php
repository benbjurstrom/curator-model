<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\EntityType;
use Illuminate\Database\Seeder;
use DB;

class EntityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = json_decode(file_get_contents(__dir__ . '/json/entity-types.json'));

        foreach ($records as $record){
            $account = new EntityType;
            $account->id = $record->id;
            $account->name = $record->name;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('entity_types', 'id'), MAX(id)) FROM entity_types;"));
    }
}

<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\Entity;
use Illuminate\Database\Seeder;
use DB;

class EntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = json_decode(file_get_contents(__dir__ . '/json/entities.json'));

        foreach ($records as $record){
            $account = new Entity();
            $account->id = $record->id;
            $account->entity_type_id = $record->entity_type_id;
            $account->parent_entity_id = $record->parent_entity_id;
            $account->name = $record->name;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('entities', 'id'), MAX(id)) FROM entities;"));
    }
}

<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\Affiliation;
use Illuminate\Database\Seeder;
use DB;

class AffiliationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $records = json_decode(file_get_contents(__dir__ . '/json/affiliations.json'));

        foreach ($records as $record){
            $account = new Affiliation;
            $account->name = $record->name;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('affiliations', 'id'), MAX(id)) FROM affiliations;"));
    }
}

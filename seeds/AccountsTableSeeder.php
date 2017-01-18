<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use BenBjurstrom\CuratorModel\Account;
use Illuminate\Database\Seeder;
use DB;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $records = json_decode(file_get_contents(__dir__ . '/json/accounts.json'));

        foreach ($records as $record){
            $account = new Account;
            $account->id = $record->id;
            $account->username = $record->username;
            $account->save();
        }

        DB::select(DB::raw("SELECT pg_catalog.setval(pg_get_serial_sequence('accounts', 'id'), MAX(id)) FROM accounts;"));
    }
}



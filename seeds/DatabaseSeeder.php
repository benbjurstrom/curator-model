<?php

namespace BenBjurstrom\CuratorModel\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EntityTypesTableSeeder::class);
        $this->call(KeywordTypesTableSeeder::class);
        $this->call(AffiliationsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(EntitiesTableSeeder::class);
        $this->call(EntityKeywordsTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
    }
}

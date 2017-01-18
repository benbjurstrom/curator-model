<?php

namespace BenBjurstrom\CuratorModel\Test;

use \BenBjurstrom\CuratorModel\Category;
use \BenBjurstrom\CuratorModel\Account;

class CategoryRelationshipsTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testCategoriesHaveAccounts()
    {
        $category = factory(Category::class)->create();

        $account = factory(Account::class)->create([
            'category_id' => $category->id,
        ]);

        $this->assertEquals($account->id, $category->accounts[0]->id);
    }
}
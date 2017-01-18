<?php

namespace BenBjurstrom\CuratorModel\Test;

use \BenBjurstrom\CuratorModel\Affiliation;
use \BenBjurstrom\CuratorModel\Account;

class AffiliationRelationshipsTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testAffiliationsHaveAccounts()
    {
        $affiliation = factory(Affiliation::class)->create();

        $account = factory(Account::class)->create([
            'affiliation_id' => $affiliation->id,
        ]);

        $this->assertEquals($account->id, $affiliation->accounts[0]->id);
    }
}
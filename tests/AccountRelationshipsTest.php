<?php
namespace BenBjurstrom\CuratorModel\Test;

use BenBjurstrom\CuratorModel\EntityType;
use BenBjurstrom\CuratorModel\Affiliation;
use BenBjurstrom\CuratorModel\Category;
use BenBjurstrom\CuratorModel\Account;
use BenBjurstrom\CuratorModel\Entity;
use BenBjurstrom\CuratorModel\Tweet;

class AcountRelationshipsTest extends TestCase
{
    private $entity_types;
    private $affiliations;
    private $categories;

    public function setUp()
    {
        parent::setUp();

        $this->entity_types = factory(EntityType::class, 2)->create();
        $this->affiliations = factory(Affiliation::class, 2)->create();
        $this->categories = factory(Category::class, 2)->create();
    }

    public function testAccountsHaveAnAffiliation()
    {
        $account = factory(Account::class)->create([
            'affiliation_id' => $this->affiliations[0]->id,
        ]);

        $this->assertEquals($this->affiliations[0]->id, $account->affiliation->id);
    }

    public function testAccountsHaveAnEntity()
    {
        $entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_types[0]->id
        ]);

        $account = factory(Account::class)->create([
            'entity_id' => $entity->id,
        ]);

        $this->assertEquals($entity->id, $account->entity->id);
    }

    public function testAccountsHaveACategory()
    {
        $account = factory(Account::class)->create([
            'category_id' => $this->categories[0]->id,
        ]);

        $this->assertEquals($this->categories[0]->id, $account->category->id);
    }

    public function testAccountsHaveTweets()
    {
        $account = factory(Account::class)->create();

        $tweet1 = factory(Tweet::class)->create([
            'account_id' => $account->id
        ]);
        $tweet2 = factory(Tweet::class)->create([
            'account_id' => $account->id
        ]);

        $this->assertEquals($tweet1->id, $account->tweets[0]->id);
        $this->assertEquals($tweet2->id, $account->tweets[1]->id);
    }

}
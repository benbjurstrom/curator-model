<?php

namespace BenBjurstrom\CuratorModel\Test;

use BenBjurstrom\CuratorModel\EntityType;
use BenBjurstrom\CuratorModel\KeywordType;
use BenBjurstrom\CuratorModel\EntityKeyword;
use BenBjurstrom\CuratorModel\Affiliation;
use BenBjurstrom\CuratorModel\Category;
use BenBjurstrom\CuratorModel\Account;
use BenBjurstrom\CuratorModel\Entity;
use BenBjurstrom\CuratorModel\Tweet;

class TweetRelationshipsTest extends TestCase
{
    private $entity_type;
    private $keyword_type;
    private $affiliation;
    private $category;
    private $entity;
    private $account;
    private $keyword;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {

        parent::setUp();

        $this->entity_type = factory(EntityType::class)->create();
        $this->keyword_type = factory(KeywordType::class)->create();
        $this->affiliation = factory(Affiliation::class)->create();
        $this->category = factory(Category::class)->create();

        $this->entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $this->account = factory(Account::class)->create([
            'affiliation_id' => $this->affiliation->id,
            'category_id' => $this->category->id,
            'entity_id' => $this->entity->id,
        ]);

        $this->keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $this->entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);
    }

    public function testTweetHasEntityTweet()
    {
        $tweet = factory(Tweet::class)->create([
            'account_id' => $this->account->id
        ]);

        $et = $tweet->entity_tweets()->create([
            'keyword_id' => $this->keyword->id,
            'entity_id' => $this->entity->id
        ]);

        $this->assertEquals($et->id, $tweet->entity_tweets[0]->id);
    }

    public function testTweetAccount()
    {
        $tweet = factory(Tweet::class)->create([
            'account_id' => $this->account->id
        ]);

        $this->assertEquals($this->account->id, $tweet->account->id);
    }
}
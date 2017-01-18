<?php

namespace BenBjurstrom\CuratorModel\Test;

use BenBjurstrom\CuratorModel\EntityType;
use BenBjurstrom\CuratorModel\KeywordType;
use BenBjurstrom\CuratorModel\EntityKeyword;
use BenBjurstrom\CuratorModel\EntityTweet;
use BenBjurstrom\CuratorModel\Account;
use BenBjurstrom\CuratorModel\Entity;
use BenBjurstrom\CuratorModel\Tweet;

class EntityTweetRelationshipsTest extends TestCase
{

    private $entity_type;
    private $keyword_type;
    private $entity;
    private $account;
    private $keyword;
    private $tweet;


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
        $this->entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $this->account = factory(Account::class)->create([
            'entity_id' => $this->entity->id,
        ]);

        $this->keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $this->entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);

        $this->tweet = factory(Tweet::class)->create([
            'account_id' => $this->account->id
        ]);
    }

    public function testEntityTweetsHaveTweets()
    {
        $entity_tweet = factory(EntityTweet::class)->create([
            'tweet_id' => $this->tweet->id,
            'keyword_id' => $this->keyword->id,
            'entity_id' => $this->entity->id
        ]);

        $this->assertEquals($this->tweet->id, $entity_tweet->tweet->id);
    }


    public function testEntityTweetsHaveKeywords()
    {
        $entity_tweet = factory(EntityTweet::class)->create([
            'tweet_id' => $this->tweet->id,
            'keyword_id' => $this->keyword->id,
            'entity_id' => $this->entity->id
        ]);

        $this->assertEquals($this->keyword->id, $entity_tweet->keyword->id);
    }

    public function testEntityTweetsHaveEntities()
    {
        $entity_tweet = factory(EntityTweet::class)->create([
            'tweet_id' => $this->tweet->id,
            'keyword_id' => $this->keyword->id,
            'entity_id' => $this->entity->id
        ]);

        $this->assertEquals($this->keyword->id, $entity_tweet->keyword->id);
    }

}
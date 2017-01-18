<?php

namespace BenBjurstrom\CuratorModel\Test;

use BenBjurstrom\CuratorModel\EntityType;
use BenBjurstrom\CuratorModel\KeywordType;
use BenBjurstrom\CuratorModel\EntityKeyword;
use BenBjurstrom\CuratorModel\EntityTweet;
use BenBjurstrom\CuratorModel\Account;
use BenBjurstrom\CuratorModel\Entity;
use BenBjurstrom\CuratorModel\Tweet;

class EntityKeywordRelationshipsTest extends TestCase
{
    private $entity_type;
    private $keyword_type;
    private $entity;
    private $account;
    private $tweet;

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

        $this->tweet = factory(Tweet::class)->create([
            'account_id' => $this->account->id
        ]);
    }

    public function testEntityKeywordsHaveEntityTweets()
    {
        $keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $this->entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);

        $entity_tweet = factory(EntityTweet::class)->create([
            'tweet_id' => $this->tweet->id,
            'entity_id' => $this->entity->id,
            'keyword_id' => $keyword->id
        ]);

        $this->assertEquals($entity_tweet->id, $keyword->entity_tweets[0]->id);
    }


    public function testEntityKeywordsHaveKeywordTypes()
    {
        $keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $this->entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);

        $this->assertEquals($this->keyword_type->id, $keyword->keyword_type->id);
    }

    public function testEntityKeywordsHaveEntities()
    {
        $keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $this->entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);

        $this->assertEquals($this->entity->id, $keyword->entity->id);
    }

}
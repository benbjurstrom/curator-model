<?php

namespace BenBjurstrom\CuratorModel\Test;

use BenBjurstrom\CuratorModel\EntityType;
use BenBjurstrom\CuratorModel\KeywordType;
use BenBjurstrom\CuratorModel\EntityKeyword;
use BenBjurstrom\CuratorModel\EntityTweet;
use BenBjurstrom\CuratorModel\Account;
use BenBjurstrom\CuratorModel\Entity;
use BenBjurstrom\CuratorModel\Tweet;

class EntityRelationshipsTest extends TestCase
{

    private $entity_type;
    private $keyword_type;


    public function setUp()
    {

        parent::setUp();

        $this->entity_type = factory(EntityType::class)->create();
        $this->keyword_type = factory(KeywordType::class)->create();
    }

    public function testEntitiesHaveTypes()
    {
        $entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $this->assertEquals($this->entity_type->id, $entity->entity_type->id);
    }

    public function testEntitiesHaveKeywords()
    {
        $entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);

        $this->assertEquals($keyword->id, $entity->keywords[0]->id);
    }

    public function testEntitiesHaveParents()
    {
        $parent = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $this->assertNull($parent->parent);

        $child = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id,
            'parent_entity_id' => $parent->id
        ]);

        $this->assertEquals($parent->id, $child->parent->id);
    }

    public function testEntitiesHaveAccounts()
    {
        $entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $account = factory(Account::class)->create([
            'entity_id' => $entity->id
        ]);

        $this->assertEquals($account->id, $entity->accounts[0]->id);
    }

    public function testEntitiesHaveChildren()
    {
        $parent = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $child1 = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id,
            'parent_entity_id' => $parent->id
        ]);

        $child2 = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id,
            'parent_entity_id' => $parent->id
        ]);

        $this->assertCount(2, $parent->children);
        $this->assertEquals($child1->id, $parent->children[0]->id);
        $this->assertEquals($child2->id, $parent->children[1]->id);
    }

    public function testEntitiesHaveTweetsThroughEntityTweets()
    {
        $account = factory(Account::class)->create();
        $entity = factory(Entity::class)->create([
            'entity_type_id' => $this->entity_type->id
        ]);

        $keyword = factory(EntityKeyword::class)->create([
            'entity_id' => $entity->id,
            'keyword_type_id' => $this->keyword_type->id
        ]);

        $tweet1 = factory(Tweet::class)->create([
            'account_id' => $account->id
        ]);
        $tweet2 = factory(Tweet::class)->create([
            'account_id' => $account->id
        ]);

        factory(EntityTweet::class)->create([
            'tweet_id' => $tweet1->id,
            'keyword_id' => $keyword->id,
            'entity_id' => $entity->id
        ]);

        factory(EntityTweet::class)->create([
            'tweet_id' => $tweet2->id,
            'keyword_id' => $keyword->id,
            'entity_id' => $entity->id
        ]);


        //$result = Entity::with(['entity_tweets','entity_tweets.tweet'])->find($entity->id)->toArray();
        $this->assertEquals($tweet1->id, $entity->entity_tweets[0]->tweet->id);
        $this->assertEquals($tweet2->id, $entity->entity_tweets[1]->tweet->id);
    }

}
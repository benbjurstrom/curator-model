<?php

namespace BenBjurstrom\CuratorModel\Test;

use \BenBjurstrom\CuratorModel\Entity;
use \BenBjurstrom\CuratorModel\EntityKeyword;
use \BenBjurstrom\CuratorModel\KeywordType;
use BenBjurstrom\CuratorModel\EntityType;

class KeywordTypeRelationshipsTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testKeywordTypesHaveKeywords()
    {
        $keyword_type = factory(KeywordType::class)->create();

        $entity = factory(Entity::class)->create([
            'entity_type_id' => factory(EntityType::class)->create()
        ]);

        $keyword = factory(EntityKeyword::class)->create([
            'keyword_type_id' => $keyword_type->id,
            'entity_id' => $entity->id,
        ]);

        $this->assertEquals($keyword->id, $keyword_type->keywords[0]->id);
    }
}
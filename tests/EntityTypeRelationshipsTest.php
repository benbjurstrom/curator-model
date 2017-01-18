<?php

namespace BenBjurstrom\CuratorModel\Test;

use \BenBjurstrom\CuratorModel\Entity;
use \BenBjurstrom\CuratorModel\EntityType;

class EntityTypeRelationshipsTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testEntityTypesHaveEntities()
    {
        $entity_type = factory(EntityType::class)->create();

        $entity = factory(Entity::class)->create([
            'entity_type_id' => $entity_type->id,
        ]);

        $this->assertEquals($entity->id, $entity_type->entities[0]->id);
    }
}
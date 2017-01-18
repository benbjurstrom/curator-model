<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /**
     * Get the entity_keywords that for this entity.
     */
    public function keywords()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\EntityKeyword', 'entity_id', 'id');
    }

    /**
     * Get the entity_type record associated with the entity.
     */
    public function entity_type()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\EntityType', 'entity_type_id', 'id');
    }

    /**
     * Get the parent entity record.
     */
    public function parent()
    {
        return $this->hasOne('BenBjurstrom\CuratorModel\Entity', 'id', 'parent_entity_id');
    }

    /**
     * Get the child entity records.
     */
    public function children()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\Entity', 'parent_entity_id', 'id');
    }

    /**
     * Get the tweets related to this entity.
     */
    public function entity_tweets()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\EntityTweet');
    }

    /**
     * Get the accounts associated with the entity.
     */
    public function accounts()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\Account');
    }
}

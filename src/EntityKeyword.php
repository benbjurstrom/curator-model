<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class EntityKeyword extends Model
{
    /**
     * Get the entity the keyword belongs to.
     */
    public function entity()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Entity');
    }

    /**
     * Get the keyword_type the keyword belongs to.
     */
    public function keyword_type()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\KeywordType');
    }

    /**
     * Get the entity_tweets tied to this keyword.
     */
    public function entity_tweets()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\EntityTweet', 'keyword_id');
    }
}

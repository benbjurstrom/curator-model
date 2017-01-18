<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class EntityTweet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['keyword_id', 'entity_id'];

    /**
     * Get the tweet record associated with the EntityTweet.
     */
    public function tweet()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Tweet');
    }

    /**
     * Get the keyword record associated with the EntityTweet.
     */
    public function keyword()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\EntityKeyword');
    }

    /**
     * Get the entity record associated with the EntityTweet.
     */
    public function entity()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Entity');
    }
}

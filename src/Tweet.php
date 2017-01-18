<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    /**
     * Get the account this tweet belongs to.
     */
    public function account()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Account');
    }

    /**
     * Get the entity_tweets that belong to this tweet.
     */
    public function entity_tweets()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\EntityTweet');
    }
}

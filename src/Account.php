<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * Get the affiliation record associated with the twitter account.
     */
    public function affiliation()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Affiliation');
    }

    /**
     * Get the category record associated with the twitter account.
     */
    public function category()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Category');
    }

    /**
     * Get the entity record associated with the twitter account.
     */
    public function entity()
    {
        return $this->belongsTo('BenBjurstrom\CuratorModel\Entity');
    }

    /**
     * Get the tweets associated with the twitter account.
     */
    public function tweets()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\Tweet');
    }
}

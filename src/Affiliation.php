<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    /**
     * Get the accounts associated with the affiliation.
     */
    public function accounts()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\Account');
    }
}

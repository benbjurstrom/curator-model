<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class KeywordType extends Model
{
    /**
     * Get the keywords associated with the KeywordType.
     */
    public function keywords()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\EntityKeyword');
    }
}
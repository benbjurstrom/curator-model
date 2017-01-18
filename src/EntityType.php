<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    /**
     * Get the entities associated with the EntityType.
     */
    public function entities()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\Entity');
    }
}

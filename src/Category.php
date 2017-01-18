<?php

namespace BenBjurstrom\CuratorModel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Get the accounts associated with the category.
     */
    public function accounts()
    {
        return $this->hasMany('BenBjurstrom\CuratorModel\Account');
    }
}

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockCategory
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockCategory extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_categories';

    /**
     * Relacionamento com stock_products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_products()
    {
        return $this->hasMany(StockProduct::class, 'id', 'stock_category_id');
    }
}
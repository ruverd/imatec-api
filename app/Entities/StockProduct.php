<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockProduct
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'max',
        'min',
        'purchase',
        'asset',
        'stock_category_id',
        'unit_id',
        'qtd'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_products';

    /**
     * Relacionamento com stock_category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_category()
    {
        return $this->belongsTo(StockCategory::class);
    }

    /**
     * Relacionamento com stock_product_moves
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_product_moves()
    {
        return $this->hasMany(StockProductMove::class, 'id', 'stock_product_id');
    }

    /**
     * Relacionamento com stock_assets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_assets()
    {
        return $this->hasMany(StockAsset::class, 'id', 'stock_product_id');
    }

    /**
     * Relacionamento com stock_supplier_products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_supplier_products()
    {
        return $this->hasMany(StockSupplierProduct::class, 'id', 'stock_product_id');
    }
}
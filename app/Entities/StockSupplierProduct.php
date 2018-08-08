<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockSupplierProduct
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSupplierProduct extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = [
        'stock_supplier_id',
        'stock_product_id',
        'stock_software_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_supplier_products';

    /**
     * Relacionamento com stock_supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_supplier()
    {
        return $this->belongsTo(StockSupplier::class);
    }

    /**
     * Relacionamento com stock_product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_product()
    {
        return $this->belongsTo(StockProduct::class);
    }

    /**
     * Relacionamento com stock_software
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_software()
    {
        return $this->belongsTo(StockSoftware::class);
    }
}
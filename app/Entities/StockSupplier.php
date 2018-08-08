<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockSupplier
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSupplier extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cnpj',
        'website',
        'contact',
        'phone1',
        'phone2',
        'address',
        'maintenance'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_suppliers';

    /**
     * Relacionamento com stock_asset_maintenances
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_asset_maintenances()
    {
        return $this->hasMany(StockAssetMaintenance::class, 'id', 'stock_supplier_id');
    }

    /**
     * Relacionamento com stock_supplier_products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_supplier_products()
    {
        return $this->hasMany(StockSupplierProduct::class, 'id', 'stock_supplier_id');
    }
}
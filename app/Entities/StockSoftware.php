<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockSoftware
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSoftware extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = ['name','version'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_softwares';

    /**
     * Relacionamento com stock_licenses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_licenses()
    {
        return $this->hasMany(StockSoftwareLicense::class, 'id', 'stock_software_id');
    }

    /**
     * Relacionamento com stock_suplier_products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_suplier_products()
    {
        return $this->hasMany(StockSupplierProduct::class, 'id', 'stock_software_id');
    }
}
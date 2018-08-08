<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockAssetMaintenance
 *
 * @package Modules\Stock\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAssetMaintenance extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'stock_asset_id',
        'stock_supplier_id',
        'expected_date',
        'responsible',
        'obs'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_asset_maintenances';

    /**
     * Relacionamento com stock_asset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_asset()
    {
        return $this->belongsTo(StockAsset::class);
    }

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
     * Relacionamento com stock_asset_moves
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_asset_moves()
    {
        return $this->hasMany(StockAssetMove::class, 'id', 'stock_asset_maintenance_id');
    }
}
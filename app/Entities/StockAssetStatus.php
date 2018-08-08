<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockAssetStatus
 *
 * @package Modules\Stock\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAssetStatus extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_asset_status';

    /**
     * Relacionamento com stock_assets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_assets()
    {
        return $this->hasMany(StockAsset::class, 'id', 'stock_asset_status_id');
    }

    /**
     * Relacionamento com stock_asset_moves
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_asset_moves()
    {
        return $this->hasMany(StockAssetMove::class, 'id', 'stock_asset_status_id');
    }
}
<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - AssetMove
 *
 * @package Modules\Stock\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAssetMove extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'code',
        'stock_asset_id',
        'stock_asset_status_id',
        'stock_spot_id',
        'user_id',
        'department_id',
        'responsible'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_asset_moves';

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
     * Relacionamento com stock_spot
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_spot()
    {
        return $this->belongsTo(StockSpot::class);
    }

    /**
     * Relacionamento com User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Relacionamento com stock_asset_status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_asset_status()
    {
        return $this->belongsTo(StockAssetStatus::class);
    }
}
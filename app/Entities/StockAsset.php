<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockAsset
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAsset extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'code',
        'stock_product_id',
        'stock_asset_status_id',
        'stock_spot_id',
        'department_id',
        'user_id',
        'model',
        'ip',
        'obs',
        'responsible',
        'price'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_assets';

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
     * Relacionamento com stock_asset_status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_asset_status()
    {
        return $this->belongsTo(StockAssetStatus::class);
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
     * Relacionamento com stock_spot
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_spot()
    {
        return $this->belongsTo(StockSpot::class);
    }

    /**
     * Relacionamento com stock_asset_moves
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_asset_moves()
    {
        return $this->hasMany(StockAssetMove::class, 'id', 'stock_asset_id');
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
}
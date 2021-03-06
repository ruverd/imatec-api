<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - Department
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class Department extends Model implements Transformable
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
    protected $table = 'departments';

    /**
     * Relacionamento com stock_assets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_assets()
    {
        return $this->hasMany(StockAsset::class, 'id', 'department_id');
    }

    /**
     * Relacionamento com stock_asset_moves
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_asset_moves()
    {
        return $this->hasMany(StockAssetMove::class, 'id', 'department_id');
    }
}
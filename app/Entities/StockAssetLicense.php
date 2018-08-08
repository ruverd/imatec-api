<?php

namespace Modules\Stock\Entities;

use App\Entities\StockAsset;
use App\Entities\StockSoftwareLicense;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockAssetLicense
 *
 * @package Modules\Stock\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAssetLicense extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'stock_asset_id',
        'stock_software_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_product_asset_licenses';

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
     * Relacionamento com stock_software_license
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_software_license()
    {
        return $this->belongsTo(StockSoftwareLicense::class);
    }
}
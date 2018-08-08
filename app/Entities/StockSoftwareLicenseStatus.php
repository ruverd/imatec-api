<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockSoftwareLicenseStatus
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSoftwareLicenseStatus extends Model implements Transformable
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
    protected $table = 'stock_software_license_status';

    /**
     * Relacionamento com stock_software_licenses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function stock_software_licenses()
    {
        return $this->hasMany(StockSoftwareLicense::class, 'id', 'stock_software_license_status_id');
    }
}
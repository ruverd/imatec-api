<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockSoftwareLicense
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSoftwareLicense extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos disponiveis para insert
     *
     * @var array
     */
    protected $fillable = [
        'stock_software_id',
        'stock_software_license_status_id',
        'serial',
        'expiration',
        'qtd',
        'obs',
        'price',
        'auto_payment',
        'agreement_date'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_software_licenses';

    /**
     * Relacionamento com stock_software
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_software()
    {
        return $this->belongsTo(StockSoftware::class);
    }

    /**
     * Relacionamento com stock_software_license_status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_software_license_status()
    {
        return $this->belongsTo(StockSoftwareLicenseStatus::class);
    }
}
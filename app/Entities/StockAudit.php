<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockAudit
 *
 * @package Modules\Stock\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockAudit extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'department_id',
        'user_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_audits';

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
}
<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - StockProductMove
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockProductMove extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'stock_product_id',
        'stock_move_type_id',
        'stock_spot_id',
        'user_id',
        'qtd',
        'total',
        'responsible',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_product_moves';

    /**
     * Relacionamento com stock_product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock_product()
    {
        return $this->belongsTo(StockProduct::class);
    }


    /**
     * Relacionamento com stock_move_type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_move_type()
    {
        return $this->belongsTo(StockMoveType::class);
    }


    /**
     * Relacionamento com Spot
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function stock_spot()
    {
        return $this->belongsTo(StockSpot::class);
    }

    /**
     * Relacionamento com user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
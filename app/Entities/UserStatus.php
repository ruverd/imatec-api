<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class - UserStatus
 *
 * @package App\Entities
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class UserStatus extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Campos permitidos na inserção
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
    protected $table = 'user_status';


    /**
     * Relacionamento com menus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_status_id');
    }
}

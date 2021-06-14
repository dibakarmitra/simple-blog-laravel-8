<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Follow
 * @package App\Models
 * @version June 11, 2021, 2:34 pm UTC
 *
 * @property integer $user_id
 * @property integer $follower_id
 */
class Follow extends Model
{

    use HasFactory;

    public $table = 'follows';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'follower_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'follower_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'follower_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}

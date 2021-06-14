<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Like
 * @package App\Models
 * @version June 11, 2021, 2:35 pm UTC
 *
 * @property integer $user_id
 * @property integer $entry_id
 * @property string $like_types
 */
class Like extends Model
{

    use HasFactory;

    public $table = 'entry_likes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'entry_id',
        'like_types'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'entry_id' => 'integer',
        'like_types' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'entry_id' => 'required',
        'like_types' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}

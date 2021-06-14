<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Entry
 * @package App\Models
 * @version June 11, 2021, 2:32 pm UTC
 *
 * @property integer $user_id
 * @property string $details
 */
class Entry extends Model
{

    use HasFactory;

    public $table = 'entries';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'details' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    
}

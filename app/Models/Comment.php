<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Comment
 * @package App\Models
 * @version June 11, 2021, 2:33 pm UTC
 *
 * @property integer $user_id
 * @property integer $entry_id
 * @property string $comment
 * @property integer $parent_comment_id
 */
class Comment extends Model
{

    use HasFactory;

    public $table = 'entry_comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'entry_id',
        'comment',
        'parent_comment_id'
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
        'comment' => 'string',
        'parent_comment_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'entry_id' => 'required',
        'comment' => 'required|string|max:255',
        'parent_comment_id' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function entry() {
        return $this->belongsTo(Entry::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}

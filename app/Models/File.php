<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class File
 * @package App\Models
 * @version June 11, 2021, 2:33 pm UTC
 *
 * @property string $entry_file_name
 * @property string $entry_file_url
 * @property integer $user_id
 * @property integer $entry_id
 */
class File extends Model
{

    use HasFactory;

    public $table = 'entry_files';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'entry_file_name',
        'entry_file_url',
        'user_id',
        'entry_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'entry_file_name' => 'string',
        'entry_file_url' => 'string',
        'user_id' => 'integer',
        'entry_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'entry_file_name' => 'required|string|max:255',
        'entry_file_url' => 'required|string|max:255',
        'user_id' => 'required',
        'entry_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function entry() {
        return $this->belongsTo(Entry::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'contest_id', 'image_path'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contest()
    {
        return$this->belongsTo('App\Contest');
    }
}

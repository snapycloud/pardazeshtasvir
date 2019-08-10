<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'video';
    protected $casts = [
        'id' => 'string'
    ];

    public $timestamps = false;

    public function attachment()
    {
        return $this->hasOne('App\Attachment', 'related_id', 'id');
    }
}

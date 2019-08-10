<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachment';
    protected $casts = [
        'id' => 'string',
        'related_id' => 'string'
    ];
    public $timestamps = false;

}

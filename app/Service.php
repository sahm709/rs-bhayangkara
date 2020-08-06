<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    public $primaryKey = 'id';

    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

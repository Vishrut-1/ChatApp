<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'user_id'];

    protected $table = 'messages';

    public function user()
    {
        return $this->belongsTo(User::class)->select('name');
    }

}

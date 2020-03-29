<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'ticket_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'user_id', 'reply_to', 'comments', 'status'
    ];

    public function user()
    {
        return $this->belongsTo( User::class, 'user_id', 'id');
    }

    public function reply_to()
    {
        return $this->belongsTo( User::class, 'reply_to', 'id');
    }

    public function setReplyToAttribute($value)
    {
        if($value == 0){
            $user = User::whereIn('rule', ['agent', 'admin'])->first();
            $value = $user->id;
        }
        $this->attributes['reply_to'] = $value;
    }
}

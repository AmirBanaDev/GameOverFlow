<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
        'body',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function score()
    {
        return $this->hasMany(Score::class);
    }
    public function countScore()
    {
        //dd($this->score()->get());
        $hasScore=$this->score()->exists();
        $score =0;
        if($hasScore == true)
        {
            $commentScores=$this->score()->get();
            foreach ($commentScores as $commentScore) {
                if($commentScore->value == 1)
                    $score++;
                else
                    $score--;
            }
            return $score;
        }
        else
        {
            return 0;
        }
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function messageReceive()
    {
        return $this->hasMany(Message::class,'Receiver');
    }
    public function messageSend()
    {
        return $this->hasMany(Message::class,'sender');
    }
    public function games()
    {
        return $this->belongsToMany(Category::class);
    }
    public function hasGame(Category $category)
    {
        return $this->games()->where('category_id',$category->id)->exists();
    }
    public function scoreReiceve()
    {
        return $this->hasMany(Score::class,'receiver');
    }
    public function scoreSend()
    {
        return $this->hasMany(Score::class,'sender');
    }
    public function commentScored(Comment $comment)
    {
        return $this->scoreSend()->where('comment_id',$comment->id)->exists();
    }
    public function commentScoredValue(Comment $comment)
    {
        $value = $this->scoreSend()->where('comment_id',$comment->id)->first();
        if($value->value == 0) return 'منفی';
        else return 'مثبت';
    }
    public function countScore()
    {
        $hasScore=$this->scoreReiceve()->exists();
        $score =0;
        if($hasScore == true)
        {
            $userScores=$this->scoreReiceve()->get();
            foreach ($userScores as $userScore) {
                if($userScore->value == 1)
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

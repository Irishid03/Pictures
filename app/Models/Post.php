<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showDiscoverPage()
    {
        // Fetch a random selection of posts, for example, 10 posts
        $posts = Post::inRandomOrder()->take(10)->get();
    
        return view('discover', compact('posts'));
    }

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
            'image',
            'name',
            'description',
            'location',
            'camera',
            'ISO',
            'aperture',
            'shutterspeed',
            'zoom',
            'user_id'  // Make sure this is included
        ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
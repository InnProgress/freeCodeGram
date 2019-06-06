<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    
    public function profileImage() {
        return '/storage/' . (($this->image) ? $this->image : 'profile/L6HgqNdLNnx64WVH7GeHU5AztQBl1f1F8wzdCQrc.jpeg');
    }
    
    
    protected $guarded = [];
    // protected $fillable = [
        //     'user_id', 'title', 'description', 'url'
        // ];
        
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function followers() {
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
protected $fillable=['title', 'description', 'price', 'user_id','category','created_at', 'updated_at'];






public function scopeOnline($query){
    return $query->where('status', 1);
}

public function user(){
    return $this->belongsTo(User::class);
}

public function proposals(){
    return $this->hasMany(Proposal::class);
}

public function likes(){
    return $this->belongsToMany(User::class);

}

public function isLiked(){
    //return $this->likes()->where('user_id', auth()->user()->id)->count() > 0;
    if(auth()->check()){
        return auth()->user()->likes->contains('id', $this->id);
    }

}

}

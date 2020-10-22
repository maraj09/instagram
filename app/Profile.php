<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    protected $guarded =[];
    public function proImg()
    {
        $imgPath = ($this->image) ? $this->image : 'uploads/noimg.jpg' ;
        return '/storage/' . $imgPath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}

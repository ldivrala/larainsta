<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $image = $this->image ? $this->image : 'uploads/no-image-available.jpg';
        return '/storage/'.$image ;
    }

    public function follower()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

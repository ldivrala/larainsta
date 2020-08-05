<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $posts = Cache::remember('count.posts'.$user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });

        $followers = $user->profile->follower->count();
        $following = $user->following->count();
        return view('profiles.index', compact('user','follows','posts','followers','following'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => "required",
            'description' => 'required',
            'url' => "",
            'image' => "image"
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->User()->profile()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        //get posts
        $posts = User::latest()->paginate(5);

        //return collection of posts as a resource
        return new UserResource(true, 'List Data Posts', $posts);
    }


    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nik'     => 'required',
            'namalengkap'     => 'required',
            'password'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $post = User::create([
            'nik'     => $request->nik,
            'namalengkap'   => $request->namalengkap,
            'password'   => $request->password,
        ]);

        //return response
        return new UserResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }


    public function show(User $post)
    {
        //return single post as a resource
        return new UserResource(true, 'Data Post Ditemukan!', $post);
    }


    public function update(Request $request, User $post)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nik'     => 'required',
            'namalengkap'     => 'required',
            'password'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        // if ($request->hasFile('image')) {

            //upload image
            // $image = $request->file('image');
            // $image->storeAs('public/posts', $image->hashName());

            //delete old image
            // Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
            'nik'     => $request->nik,
            'namalengkap'   => $request->namalengkap,
            'password'   => $request->password,
            ]);

        // } else {

            //update post without image
            $post->update([
            'nik'     => $request->nik,
            'namalengkap'   => $request->namalengkap,
            'password'   => $request->password,
            ]);
        // }

        //return response
        return new UserResource(true, 'Data Post Berhasil Diubah!', $post);
    }


    public function destroy(User $post)
    {
        //delete image
        // Storage::delete('public/posts/'.$post->image);

        //delete post
        $post->delete();

        //return response
        return new UserResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}

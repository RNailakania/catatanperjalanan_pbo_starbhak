<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Catatanperjalanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CatatanperjalananResource;

class NoteController extends Controller
{
    public function index()
    {
        //get posts
        $posts = Catatanperjalanan::latest()->paginate(5);

        //return collection of posts as a resource
        return new CatatanperjalananResource(true, 'List Data Posts', $posts);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'lokasi'     => 'required',
            'suhutubuh'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        //create post
        $post = Catatanperjalanan::create([
            'lokasi'     => $request->lokasi,
            'suhutubuh'   => $request->suhutubuh,
        ]);

        //return response
        return new CatatanperjalananResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }



    public function show(Catatanperjalanan $post)
    {
        //return single post as a resource
        return new CatatanperjalananResource(true, 'Data Post Ditemukan!', $post);
    }

    

    public function update(Request $request, Catatanperjalanan $post)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'lokasi'     => 'required',
            'suhutubuh'   => 'required',
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
                'lokasi'     => $request->lokasi,
                'suhutubuh'   => $request->suhutubuh,
            ]);

        // } else {

            //update post without image
            $post->update([
                'lokasi'     => $request->lokasi,
                'suhutubuh'   => $request->suhutubuh,
            ]);
        // }

        //return response
        return new CatatanperjalananResource(true, 'Data Post Berhasil Diubah!', $post);
    }


    public function destroy(Catatanperjalanan $post)
    {
        //delete image
        // Storage::delete('public/posts/'.$post->image);

        //delete post
        $post->delete();

        //return response
        return new CatatanperjalananResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= photo::all()->toArray();
        return view("photo.photo", ['data'=>$data]);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('p');
		$ext=$image->extension();
		$file=time().'.'.$ext;
        $img=$image->storeAs('ava',$file,'public');
        
        $p = new Photo([
            'img' => $img
        ]);
        $p->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(photo $photo)
    {
        
        if ($photo->delete()) {
            storage::delete("/public/$photo->img");
        }
        return back();
    }
}

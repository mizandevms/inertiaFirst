<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();
        return Inertia::render('Image/Index',[
            'image' => $image
        ]);

        // return Inertia::render('Image/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return Inertia::render('Image/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $request->validate([
            'title'=> 'required',
            'amount'=> 'required',
            'image'=> 'required|image|mimes:jpg,jpeg,png,gif', 
        ]);

        $image = $request->file('image');
        // dd($image);
        if (isset($image)) {
            //create an unique name
            $imgName = Str::slug($request->title) . uniqid() . '.' . $image->getClientOriginalExtension();
            // dd($imgName);
        }
       
        Image::Create([
            'title'=>$request->title,
            'amount'=>$request->amount,
            'image' => $image->storeAs('imageStore', $imgName)
        ]);

        return Redirect::route('images.index')->with('success','Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
         return Inertia::render('Image/Edit',['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
         $request->validate([
            'title'=> 'required',
            'amount'=> 'required',  
            'image'=> 'nullable|mimes:jpg,jpeg,png,gif',        
            ]);
        $imageUpdate = $request->file('image');
                //  dd($imageUpdate);
        if (isset($imageUpdate)) {                    
                $imgName = Str::slug($request->title) . uniqid() . '.' . $imageUpdate->getClientOriginalExtension();
                if (Storage::disk('public')->exists($image->getRawOriginal('image'))) {
                Storage::disk('public')->delete($image->getRawOriginal('image'));
            }
                    // dd($imgName);
        }
       

          $image->update([
               'title'=>$request->title,
                'amount'=>$request->amount,
                'image' => isset($imageUpdate) ? $imageUpdate->storeAs('imageStore', $imgName) : $image->getRawOriginal('image'),
                // 'image' => $image->storeAs('imageStore', $imgName)
            ]);
            return Redirect::route('images.index')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();
          
         return Redirect::route('images.index')->with('success','Image Deleted');
    }
}

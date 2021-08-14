<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return Inertia::render('Services/Index',[
            'services' => $service
        ]);
        // ,[
        //     'packages'=>$packages
        // ]
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Services/Create');
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
                'firstName'=>'required',
                'lastName'=>'required',
                'email'=>'required',
                'country'=>'required',
                'street'=>'required',
                'city'=>'required',                
                'province'=>'required',
                'postal'=>'required',             
            ]);


           Service::create([
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'email'=>$request->email,               
                'country'=>$request->country,
                'street'=>$request->street,
                'city'=>$request->city,
                'province'=>$request->province,
                'postal'=>$request->postal,
                
            ]);
            return redirect()->route('services.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit( $service)
    {   $service = Service::where('id',$service)->first();
        return Inertia::render('Services/Edit',['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //  dd($service);
         $request->validate([
                'firstName'=>'required|string',
                'lastName'=>'required|string',
                'email'=>'required|string',
                'country'=>'required|string',
                'street'=>'required|string',
                'city'=>'required|string',                
                'province'=>'required|string',
                'postal'=>'required|string',             
            ]);


          $service->update([
                'firstName'=>$request->firstName,
                // 'slug'=>Str::slug($request->firstName),
                'lastName'=>$request->lastName,
                'email'=>$request->email,               
                'country'=>$request->country,
                'street'=>$request->street,
                'city'=>$request->city,
                'province'=>$request->province,
                'postal'=>$request->postal,
                
            ]);
            return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {

    
        //   $service = Service::where('id',$service)->first();
        //  dd($service);      
      
        $service->delete();
          
         return Redirect::route('services.index')->with('success','Service Deleted');
        
    }
}

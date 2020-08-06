<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('name', 'desc')->paginate(10);

        return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'praktek' => 'required',
            'hotline' => 'required',
            'jam' => 'required',
            'hari' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle file upload

        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $service = new Service;
        $service->name = $request->input('name');
        $service->body = $request->input('body');
        $service->praktek = $request->input('praktek');
        $service->hotline = $request->input('hotline');
        $service->jam = $request->input('jam');
        $service->hari = $request->input('hari');
        $service->user_id = auth()->user()->id;
        $service->cover_image = $fileNameToStore;
        $service->save();
        return redirect('/services')->with('success', 'Service Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        // // check for correct user
        // info(auth()->user()->id);
        // info($service->user);
        // // if (auth()->user()->id !== $service->user->user_id) {
        // //     return redirect('/services')->with('error', "Unauthorized Page");
        // // }
        return view('services.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required',
            'praktek' => 'required',
            'hotline' => 'required',
            'jam' => 'required',
            'hari' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle file upload

        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $service = new Service;
        $service->name = $request->input('name');
        $service->body = $request->input('body');
        $service->praktek = $request->input('praktek');
        $service->hotline = $request->input('hotline');
        $service->jam = $request->input('jam');
        $service->hari = $request->input('hari');
        $service->user_id = auth()->user()->id;
        $service->cover_image = $fileNameToStore;
        $service->save();
        return redirect('/services')->with('success', 'Service Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/services')->with('success', 'service Removed');
    }
}

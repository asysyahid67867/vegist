<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $photo_path = $request->file('photo')->storeAs('public/events',$filename);

        //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.
        $photo_path = str_replace('public/','',$photo_path); 

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'photo' => $photo_path,
            'category_id' => $request->category_id,
            'employee_id' => $request->employee_id,
        ];

        $event = Event::create($data);

        return redirect()->route('admin.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.update', compact('event','categories'));
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
        $file = $request->file('photo');
        if ($file != null) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $photo_path = $request->file('photo')->storeAs('public/events',$filename);
            //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.
            $photo_path = str_replace('public/','',$photo_path); 
        }


        $event = Event::find($id);

        $event->name = $request->name;
        $event->price = $request->price;
        $event->description = $request->description;
        if ($file != null) {
            $event->photo = $photo_path;
        }
        $event->category_id = $request->category_id;
        $event->employee_id = $request->employee_id;
        $event->save();

        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('admin.event.index');
    }
}

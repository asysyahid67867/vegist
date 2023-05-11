<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
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
        $photo_path = $request->file('photo')->storeAs('public/employees',$filename);

        //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.
        $photo_path = str_replace('public/','',$photo_path); 

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'work_hour' => $request->work_hour,            
            'photo' => $photo_path,
        ];

        $employee = Employee::create($data);

        return redirect()->route('admin.employee.index');
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
        $employee = Employee::find($id);
        return view('admin.employee.update', compact('employee'));
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
            $photo_path = $request->file('photo')->storeAs('public/employees',$filename);
            //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.
            $photo_path = str_replace('public/','',$photo_path); 
        }


        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->description = $request->description;
        $employee->work_hour = $request->work_hour;
        if ($file != null) {
            $employee->photo = $photo_path;
        }
        $employee->save();

        return redirect()->route('admin.employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('admin.employee.index');
    }
}

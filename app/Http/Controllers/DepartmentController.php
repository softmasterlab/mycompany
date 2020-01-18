<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Department;
use App\Position;
use App\Employee;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deps = Department::all();
        $dep_id = 0;
        $user = Auth::user();
        $data = [
            'deps' => $deps,
            'dep_id' => $dep_id,
            'user' => $user->name
        ];
        return view('departments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('dep_name');
        $dep = new Department();
        $dep->dep_name = $name;
        $dep->save();
        return redirect()->action('DepartmentController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dep = Department::find($id);
        $poss = Position::where('dep_id', $id)->get();
        $emps = [];
        foreach ($poss as $pos) {
            $group = Employee::where('pos_id', $pos->id)->get();
            foreach ($group as $e) {
                $emps[] = [
                    'pos_name' => $pos->pos_name,
                    'person' => $e
                ];
            }
        }
        $user = Auth::user();
        $data = [
            'dep' => $dep,
            'poss' => $poss,
            'emps' => $emps,
            'user' => $user->name
        ];
        return view('departments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = Department::find($id);
        $data = [
            'dep' => $dep
        ];
        return view('departments.edit', $data);
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
        $name = $request->input('dep_name');
        $dep = Department::find($id);
        $dep->dep_name = $name;
        $dep->save();
        return redirect()->action('DepartmentController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep = Department::find($id);
        $dep->delete();
        return redirect()->action('DepartmentController@index');
    }
}

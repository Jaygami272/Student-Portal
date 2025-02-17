<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;


class TimetableController extends Controller
{
    
    public function index()
    {
        $ltimetable=Timetable::get()->where('file_type',1);
        return view('timetables.lacture_tt_index')->with('ltimetables', $ltimetable);
    }

    public function eindex()
    {
        $ltimetable=Timetable::get()->where('file_type',2);
        return view('timetables.exam_tt_index')->with('ltimetables', $ltimetable);
       
    }

   
    public function create()
    {
        
        $d_id=Auth::user()->department_id;
        
        $department=Department::find($d_id);
        return view('timetables.create_lacture_tt')->with('departments',$department);
    }

    public function ecreate()
    {
        
        $d_id=Auth::user()->department_id;
        
        $department=Department::find($d_id);
        return view('timetables.create_exam_tt')->with('departments',$department);
    }

    
    public function store(Request $request)
    {
        $d_id=Department::where('department_name',$request['dept_id'])->first();
        
        $timetable=new Timetable();
        $file=$request->file('photo');
       
        $path=$request->file('photo')->store('image','public');
        $f_type=1;
        $timetable->dept_id=$d_id->id;
        $timetable->sem=$request['sem'];
        $timetable->file_name=$path;
        $timetable->file_type=$f_type;
        $timetable->save();

        Flash::success('File Uplode successfully.');

        return redirect(route('timetables.index'));

    }

    public function estore(Request $request)
    {
        $d_id=Department::where('department_name',$request['dept_id'])->first();
        
        $timetable=new Timetable();
        $file=$request->file('photo');
       
        $path=$request->file('photo')->store('image','public');
        $f_type=2;
        $timetable->dept_id=$d_id->id;
        $timetable->sem=$request['sem'];
        $timetable->file_name=$path;
        $timetable->file_type=$f_type;
        $timetable->save();

        Flash::success('File Uplode successfully.');

        return redirect(route('timetables.eindex'));

    }

   
    public function show(Timetable $timetable)
    {
        //
    }

    
    public function edit(Timetable $timetable)
    {
       
    }

    
    public function update(Request $request, Timetable $timetable)
    {
        //
    }

    
    public function destroy($id)
    {
        $timetable=Timetable::find($id);
        $timetable->delete();
        $img_path=public_path("storage/").$timetable->file_name;
        if(file_exists($img_path)){
            @unlink($img_path);
        }

        return redirect(route('timetables.index'));
    }

    public function edestroy($id)
    {
        $timetable=Timetable::find($id);
        $timetable->delete();
        $img_path=public_path("storage/").$timetable->file_name;
        if(file_exists($img_path)){
            @unlink($img_path);
        }

        return redirect(route('timetables.eindex'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Subject;
use App\Models\Teachs;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeachsController extends Controller
{

    public function index()
    {
        $teach=Teachs::get();
        return view('teachs.index')->with('teachs',$teach);
    }


    public function create()
    {
        $d_id = Auth::user()->department_id;
        $subject = Subject::where('depart_id',$d_id)->get();
        $faculty = Faculty::where('depart_id',$d_id)->get();
        return view('teachs.create')->with('subject', $subject)->with('faculty', $faculty);
    }


    public function store(Request $request)
    {
        $faculty_id=count($request['faculty_id']);
        $d_id = Auth::user()->department_id;
        for($i=0;$i<$faculty_id;$i++){
        DB::table('teachs')
        ->insert([
            'sub_id' => $request['sub_id'],
            'faculty_id' => $request->faculty_id[$i],
            'depart_id' => $d_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    return redirect(route('teachs.index'));
       

       
    }


    public function show(Teachs $teachs)
    {
        //
    }


    public function edit(Teachs $teachs)
    {
        //
    }


    public function update(Request $request, Teachs $teachs)
    {
        //
    }


    public function destroy($id)
    {
        $teach=Teachs::find($id);
        if (empty($teach)) {
            Flash::error('Teach not found');

            return redirect(route('teachs.index'));
        }

        $teach->delete();

        Flash::success('Allotment Subject is deleted successfully.');

        return redirect(route('teachs.index'));
    }
    
}

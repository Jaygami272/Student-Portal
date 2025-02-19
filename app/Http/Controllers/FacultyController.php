<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->department_id;
        $faculty = Faculty::where('depart_id', $id)->get();
        return view('Faculties.index')->with('facultys', $faculty)->with('id',$id);
    }


    public function create()
    {
        return view('Faculties.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            // 'name'=>'required|unique:faculties,name',
        ]);

        $data = [
            "course" => $request['course'],
            "college_name" => $request['college_name']
        ];

        $educationalDetails = [];
        foreach ($data['course'] as $index => $course) {
            $educationalDetails[] = $course . " from " . $data['college_name'][$index];
        }

        $educationString = implode(" & ", $educationalDetails);


        $uemail = User::where('email', $request['email'])->first();
        $string = Str::random(8);
        $role = Role::where('slug', 'faculty')->first();
        $d_id = Auth::user()->department_id;
        $user = new User();
        $faculty = new Faculty();

        if (empty($uemail)) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($string);
            $user->role_id = $role->id;
            $user->department_id = $d_id;
            $user->save();
        }
        $u = User::where('email', $request['email'])->first();
        $faculty->name = $request['name'];
        $faculty->phone_no = $request['phone_no'];
        $faculty->depart_id = $d_id;
        $faculty->user_id = $u->id;
        $faculty->education_detail = $educationString;
        $faculty->save();
        $detail = [
            'description' => $string,
        ];
        $operator['to'] = $request['email'];
        Mail::send('operators.mailindex', $detail, function ($message) use ($operator) {
            $message->subject("Hello");
            $message->to($operator['to']);
        });
        Flash::success('Faculty Save Successfully');
        return redirect(route('facultys.index'));
    }


    public function show($id)
    {

        $faculty = Faculty::find($id);

        if (empty($faculty)) {
            Flash::error('Department not found');
            return redirect(route('departments.index'));
        }
        $educationString = $faculty->education_detail;
        $courseCollegePairs = explode(" & ", $educationString);

        $courses = [];
        $colleges = [];

        foreach ($courseCollegePairs as $pair) {
            // Split each pair by " from " to separate the course and college
            list($course, $college) = explode(" from ", $pair);

            $courses[] = $course;
            $colleges[] = $college;
        }
        $total=count($courses);

        return view('Faculties.detail')->with('facultys', $faculty)->with('course',$courses)->with('college',$colleges)->with('n',$total);
    }


    public function edit($id) {
        $faculty=Faculty::where('depart_id',$id)->get();
        return view('Faculties.remove')->with('facultys',$faculty);
    }

   

    public function update(Request $request,$id) {
        return $id;
        $faculty=Faculty::where('id',$id)->first();
        
        $user=User::find($faculty->user_id);
        
        $string = Str::random(8);
       
        $data = [
            "course" => $request['course'],
            "college_name" => $request['college_name']
        ];
        
        $educationalDetails = [];
        foreach ($data['course'] as $index => $course) {
            $educationalDetails[] = $course . " from " . $data['college_name'][$index];
        }
        
        $educationString = implode(" & ", $educationalDetails);
        
        if($request['email']!=$user->email){
            $user->password=Hash::make($string);
            $detail = [
                'description' => $string,
            ];
            $operator['to']=$request['email'];
            Mail::send('operators.mailindex', $detail, function ($message) use($operator) {
                $message->subject("Hello");
                $message->to($operator['to']);
            });
        }
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->update() ;
        $faculty->name=$request['name'];
        $faculty->phone_no=$request['phone_no'];
        $faculty->education_detail=$educationString;
        $faculty->update() ;
        Flash::success('Faculty Edit Successfully');
        return redirect(route('departments.index'));
    }


    public function destroy($id) {

        $faculty=Faculty::where('id',$id)->first();
        $user=User::where('id',$faculty->user_id)->first();
        $faculty->delete();
        $user->delete();
        Flash::success('Faculty Remove successfully.');
        return redirect(route('facultys.index'));
    }

    public function notify(){
        return view('Faculties.notification');
    }
}

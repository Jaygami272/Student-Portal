<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\User;
use App\Models\Hod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class DepartmentController extends Controller
{
    
    public function index()
    {
        $department=Department::get();

        return view('departments.index')->with('department',$department);
    }

   
    public function create()
    {
       return view('departments.create');

    }

   
    public function store(Request $request)
    { 
        
    
        $request->validate([
            
            'email' => 'required|unique:users,email',
            
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


        $ex=Department::where('department_name',$request['department_name'])->count();
        if($ex==1){
            Flash::error('This Department is already exist..');
            return redirect(route('departments.index'));
        }
        // $request->validate([
        //     'department_name'=>'required|unique:departments,department_name',
        // ]);
        
        if($ex==0){
            
        $string = Str::random(8);
        $role = Role::where('slug', 'hod')->first();
        $department=new Department();
        $user=new User();
        Flash::success('Department Save Successfully');
        $department->department_name=$request['department_name'];
        $department->save();
        $d_id=Department::where('department_name',$request['department_name'])->first();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=Hash::make($string);
        $user->role_id=$role->id;
        $user->department_id=$d_id->id;
        $user->save();
        $u_id=User::where('email',$request['email'])->first();
        $hod=new Hod();
        $hod->name=$request['name'];
        $hod->phone_no=$request['phone_no'];
        $hod->education_detail=$educationString;
        $hod->user_id=$u_id->id;
        $hod->save();
        $detail = [
            'description' => $string,
        ];
        $operator['to']=$request['email'];
        Mail::send('operators.mailindex', $detail, function ($message) use($operator) {
            $message->subject("Hello");
            $message->to($operator['to']);
        });

        return redirect(route('departments.index'));
       
    }else{
        Flash::success('Department Save Successfully');
        return redirect(route('departments.index'));
    }
    
    }
    
    public function show($id)

    {
       
        $departments=Department::find($id);
       
        if(empty($departments)){
            Flash::error('Department not found');
            return redirect(route('departments.index'));
        }
        $role=Role::where('slug','hod')->first();
        $user=User::where('role_id',$role->id)->where('department_id',$departments->id)->first();
        $hod=Hod::where('user_id',$user->id)->first();
        $educationString=$hod->education_detail;
        $faculty=Faculty::where('depart_id',$id)->count();
        $count=[
            'facultys'=>$faculty,
            'phone'=>$hod->phone_no,
            'department_name'=>$departments->department_name
        ];
        

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

// Now you have arrays for courses and colleges


        return view('departments.detail',compact('count'))->with('users',$user)->with('course',$courses)->with('college',$colleges)->with('n',$total);
    }

    
    public function edit(Department $department)
    {
        
    }

   
    public function update($id,Request $request)
    {
        $departments=Department::find($id);
        $hod=Hod::where('user_id',$id)->first();
        
        $user=User::find($id);
        
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
        $hod->name=$request['name'];
        $hod->phone_no=$request['phone_no'];
        $hod->education_detail=$educationString;
        $hod->update() ;
        Flash::success('Department Edit Successfully');
        return redirect(route('departments.index'));
    }

  
    public function destroy(Department $department)
    {
        //
    }
}

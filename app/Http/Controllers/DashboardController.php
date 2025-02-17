<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role->slug=="admin"){
        $department=Department::count();
        
        $count=[
            'departments'=>$department
        ];
        return view('dashboard.index',compact('count'));
    }elseif(Auth::user()->role->slug=="hod"){
        $faculty=Faculty::Where('depart_id',Auth::user()->department_id)->count();
        $count=[
            'faculty'=>$faculty
        ];
        return view('dashboard.hod_index',compact('count'));
    }elseif(Auth::user()->role->slug=="faculty"){
        return view('dashboard.faculty_index');
    }
    }

   
    public function create()
    {
       
    }

    public function store(Request $request)
    {
       
    }

   
    public function show()
    {
       
    }

    
    public function edit()
    {
        
    }

   
    public function update(Request $request)
    {
        
    }

    
    public function destroy()
    {
        
    }
}

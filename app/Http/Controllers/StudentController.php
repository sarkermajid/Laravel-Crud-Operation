<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index(){

        $student = Student::all();
        return view('students.index',compact('student'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
        $student = new Student();
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->mobile = $request->input('mobile');
        $student->course = $request->input('course');
        if($request->hasFile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $finename = time() . '.' . $extension;
            $file->move('uploads/students', $finename);
            $student->profile_image = $finename;
            $student->save();
            return redirect()->back()->with('success','Student Added Successfully!');
        }else{
            return redirect()->back()->with('error','Student Was Not Added Successfully');
        };

    }

    public function edit($id){
        $student = Student::find($id);
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->mobile = $request->input('mobile');
        $student->course = $request->input('course');

        if($request->hasFile('profile_image'))
        {
            $destination = 'uploads/students'.$student->profile_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . $extension;
            $file->move('uploads/students', $filename);
            $student->profile_image = $filename;
        }
        $student->update();
        return redirect()->back()->with('update','Student Updated Successfully!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/students'.$student->profile_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $student->delete();
        return redirect()->back()->with('delete','Student Deleted Successfully!');
    }
}

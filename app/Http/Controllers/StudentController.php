<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
   public function index()
   {
      $students = Student::orderBy('id','DESC')->get();
    return view('crud',compact('students'));
   }

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required',
         'class' => 'required',
         'roll' => 'required',
      ],[
         'name.required' => 'Please Input Your Name',
         'class.required' => 'Please Input Your Class',
         'roll.required' => 'Please Input Your Roll',
      ]);

      Student::insert([
       'name' => $request->name,
       'class' => $request->class,
       'roll' => $request->roll,
      ]);

      return back()->with('insert-message','Data Inserted Successfully');

   }





   public function edit($id)
   {
      $students = Student::findOrFail($id);
    return view('edit',compact('students'));
   }


   public function update(Request $request,$id)
   {
      $request->validate([
         'name' => 'required',
         'class' => 'required',
         'roll' => 'required',
      ],[
         'name.required' => 'Please Input Your Name',
         'class.required' => 'Please Input Your Class',
         'roll.required' => 'Please Input Your Roll',
      ]);

      Student::findOrfail($id)->update([
       'name' => $request->name,
       'class' => $request->class,
       'roll' => $request->roll,
      ]);

      return redirect()->to('/crud')->with('update-message','Data Updated Successfully');
   }





   public function delete($id)
   {
       Student::findOrFail($id)->delete();

       return back()->with('delete-message','Data Deleted Successfully');
   }

}

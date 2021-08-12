<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index(){
    $datas = Student::latest()->paginate(10);
   
    return view('students', compact('datas'));
   }
   public function Add_Students(){

    return view('addstudents');
   }

   public function Store_Students(Request $request){
    $validatedData = $request->validate([
        'name' => ['required', 'max:255'],
        'roll_no' => ['required', 'unique:students'],
        'maths' => ['required'],
        'physics' => ['required'],
        'chemistery' => ['required'],
        'computer' => ['required'],
        'biology' => ['required'],
    ]);

    Student::insert([
        'name' => $request->name,
        'roll_no' => $request->roll_no,
        'maths' => $request->maths,
        'physics' => $request->physics,
        'chemistery' => $request->chemistery,
        'computer_science' => $request->computer,
        'biology' => $request->biology,
        'created_at' => Carbon::now()
        
        
        
    ]);
    return Redirect()->back()->with('success','Student Inserted Successfull');
   }
     
   public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $students = Student::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $students = Student::latest()->get();
                }
            } else {
                $students = Student::latest()->get();
            }

            return response()->json([
                'students' => $students
            ]);
        } else {
            abort(403);
        }
    }

    public function studentedit(){
        $datas = Student::latest()->paginate(10);
   
        return view('studentsedit', compact('datas'));
    }

    public function Edit($id){
        
        $students = DB::table('students')->where('id',$id)->first();
        return view('student_edit',compact('students'));

    }

    public function Update(Request $request ,$id){
       
        $data = array();
        $data['name'] = $request->name;
        $data['roll_no'] = $request->roll_no;
        $data['maths'] = $request->maths;
        $data['physics'] = $request->physics;
        $data['chemistery'] = $request->chemistery;
        $data['computer_science'] = $request->computer;
        $data['biology'] = $request->biology;

        DB::table('students')->where('id',$id)->update($data);
       

        return Redirect()->route('student.edit')->with('success','Category Updated Successfull');

    }

    public function Delete($id){
        $delete = Student::find($id)->delete();
        return Redirect()->back()->with('success','Student  Delete Successfully');
    }

    public function report(){
       
        $students = Student::latest()->paginate(10);

        return view('report', compact('students'));
    }
}

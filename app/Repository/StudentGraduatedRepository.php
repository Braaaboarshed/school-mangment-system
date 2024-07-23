<?php


namespace App\Repository;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index(){
$students = Student::onlyTrashed()->get();
return view('pages.Students.Graduated.index',compact('students'));

    }

    public function create(){
        $Grades = Grade::All();
        return view('pages.Students.Graduated.create', compact('Grades'));
    }

    public function SoftDelete($request){
       $students = student::where('id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

       if($students->count() < 1)
       return redirect()->back()->with('error Graduated', __('لا توجد بيانات في جدول الطلاب')) ;

       foreach($students as $student){
        $ids = explode(',',$student->id);
        student::whereIn('id',$ids)->Delete();
       }

       toastr()->success(trans('messages.success'));
       return redirect()->route('Graduated.index');

    }

    public function returnDate($request){
     Student::onlyTrashed()->where('id',$request->id)->first()->restore();
     toastr()->success(trans('messages.success'));
     return redirect()->back();
    }

    public function destroy($request)
    {
        Student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

}

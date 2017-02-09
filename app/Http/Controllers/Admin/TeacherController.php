<?php

namespace App\Http\Controllers\Admin;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(30);
        return view('admin.pages.teacher.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:teachers',
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();
       /* if($request->input('pdf')){
            $data = $request->all();
            $filename=$request->input('name');
            $pdf = PDF::loadView('admin.pdf.teacher', compact('data'));
            return $pdf->stream($filename.'.pdf');
        }*/
       if($request->input('mail')){
           $email = $request->input('email');
           $data = $request->all();
           Mail::to($email)->send(new \App\Mail\TeacherData($data));
       }
       Teacher::create([
           'name' => $request['name'],
           'email' => $request['email'],
           'password' => bcrypt($request['password']),
       ]);
        return redirect('admin/teacher')->with('status',trans('messages.teacher_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('admin/teacher')->with('status', trans('messages.record_delete'));
    }
}

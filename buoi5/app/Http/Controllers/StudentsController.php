<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\student;
use Illuminate\Http\Request;
use Exception;

class StudentsController extends Controller
{

    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = student::with('major')->paginate(25);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $majors = Major::pluck('name_major','id')->all();
        
        return view('students.create', compact('majors'));
    }

    /**
     * Store a new student in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            student::create($data);

            return redirect()->route('students.student.index')
                ->with('success_message', 'Student was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified student.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $student = student::with('major')->findOrFail($id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $student = student::findOrFail($id);
        $majors = Major::pluck('name_major','id')->all();

        return view('students.edit', compact('student','majors'));
    }

    /**
     * Update the specified student in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $student = student::findOrFail($id);
            $student->update($data);

            return redirect()->route('students.student.index')
                ->with('success_message', 'Student was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified student from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $student = student::findOrFail($id);
            $student->delete();

            return redirect()->route('students.student.index')
                ->with('success_message', 'Student was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'fullname' => 'string|min:1|nullable',
            'email' => 'nullable',
            'Birthday' => 'string|min:1|nullable',
            'reg_date' => 'date_format:j/n/Y|nullable',
            'major_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}

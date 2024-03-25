<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\major;
use Illuminate\Http\Request;
use Exception;

class MajorsController extends Controller
{

    /**
     * Display a listing of the majors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $majors = major::paginate(25);

        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new major.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('majors.create');
    }

    /**
     * Store a new major in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            major::create($data);

            return redirect()->route('majors.major.index')
                ->with('success_message', 'Major was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified major.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $major = major::findOrFail($id);

        return view('majors.show', compact('major'));
    }

    /**
     * Show the form for editing the specified major.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $major = major::findOrFail($id);
        

        return view('majors.edit', compact('major'));
    }

    /**
     * Update the specified major in the storage.
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
            
            $major = major::findOrFail($id);
            $major->update($data);

            return redirect()->route('majors.major.index')
                ->with('success_message', 'Major was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified major from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $major = major::findOrFail($id);
            $major->delete();

            return redirect()->route('majors.major.index')
                ->with('success_message', 'Major was successfully deleted.');
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
                'name_major' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}

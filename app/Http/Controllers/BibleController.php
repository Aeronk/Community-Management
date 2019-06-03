<?php

namespace App\Http\Controllers;

use DB;
use App\Bible;
use Illuminate\Http\Request;

class BibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibles = Bible::all();
        return view('bible.bible-view')->with('bibles', $bibles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = DB::table('courses')->get();
        return view('bible.bible-add')->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'enrollment' => 'numeric',
            'number_of_branches' => 'numeric',
            'sub_balance' => 'numeric'
        ]);

        $string3 = '';
        if (is_array($request->input('courses')) || is_object($request->input('courses'))) {
            foreach ($request->input('courses') as $course) {
                $string3 .= $course . ',';
            }
        }

        Bible::unguard();
        $bible = Bible::create([

            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'enrollment' => $request->input('enrollment'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'contact_person' => $request->input('contact_person'),
            'founder' => $request->input('principal'),
            'subscription' => $request->input('subscription'),
            'courses' => $string3,
            'sub_balance' => $request->input('sub_balance'),
            'number_of_branches' => $request->input('number_of_branches'),
            'category' => $request->input('category')

        ]);

        // return redirect()->back()->with('message', 'Bible School Added successfully');
        return redirect()->route('bible.show', [$bible->id])->with('message', 'Bible School Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bible $bible
     * @return \Illuminate\Http\Response
     */
    public function show(Bible $bible)
    {
        return view('bible.bible-single')->with('bible', $bible);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bible $bible
     * @return \Illuminate\Http\Response
     */
    public function edit(Bible $bible)
    {
        $courses = DB::table('courses')->get();
        return view('bible.bible-edit')->with('bible', $bible)
            ->with('courses', $courses);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Bible $bible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bible $bible)
    {

        $string3 = '';
        if (is_array($request->input('courses')) || is_object($request->input('courses'))) {
            foreach ($request->input('courses') as $course) {
                $string3 .= $course . ',';
            }
        }

        Bible::unguard();
        $bible->update([

            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'enrollment' => $request->input('enrollment'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'contact_person' => $request->input('contact_person'),
            'email' => $request->input('email'),
            'founder' => $request->input('principal'),
            'subscription' => $request->input('subscription'),
            'courses' => $string3,
            'sub_balance' => $request->input('sub_balance'),
            'number_of_branches' => $request->input('number_of_branches'),
            'category' => $request->input('category')

        ]);

        // return redirect()->back()->with('message', 'Bible School Added successfully');
        return redirect()->route('bible.show', [$bible->id])->with('message', 'Bible School Added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bible $bible
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bible $bible)
    {
        if ($bible->delete()) {
            return redirect()->back()->with('message', "Record deleted successfully");
        }

        return redirect()->back()->with('error', "An error occured while deleting record");

    }
}

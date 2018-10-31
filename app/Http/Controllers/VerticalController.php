<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\School;
use App\Vertical;
use App;
use Illuminate\Http\Request;
use App\Http\Requests;

class VerticalController extends Controller
{

	/**
     * Instantiate a new VerticalController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school)
    {
        $verticals = DB::table('verticals')->where('school_id', $school->id)->get();
        //return view('verticals.index', compact('verticals'));
        return view('verticals.index', ['verticals' => $verticals, 'school'=> $school]);
    }

    // Create Schools
    public function store(Request $request, Vertical $vertical) {

        $vertical = new Vertical;
        $vertical->name = $request->name;
        $vertical->school_id = $request->school_id;
        $vertical->save();

        return back();
    }

    public function delete(Vertical $vertical) {
        $vertical->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\School;
use App\Vertical;
use App\Subvertical;
use App;
use Illuminate\Http\Request;
use App\Http\Requests;

class SubverticalController extends Controller
{
    /**
     * Instantiate a new SubverticalController instance.
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
    public function index(School $school, Vertical $vertical)
    {
        $subverticals = DB::table('subverticals')->where([
		    ['school_id', $school->id],
		    ['vertical_id', $vertical->id],
		])->get();
        
        return view('subverticals.index', ['vertical' => $vertical, 'school'=> $school, 'subverticals' => $subverticals]);
    }

    // Create Subverticals
    public function store(Request $request, Vertical $vertical, Subvertical $subvertical) {

        $subvertical = new Subvertical;
        $subvertical->name = $request->name;
        $subvertical->school_id = $request->school_id;
        $subvertical->vertical_id = $request->vertical_id;
        $subvertical->save();

        return back();
    }

    public function delete(Subvertical $subvertical) {
        $subvertical->delete();
        return back();
    }
}

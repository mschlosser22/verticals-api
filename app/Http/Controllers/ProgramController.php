<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\School;
use App\Vertical;
use App\Subvertical;
use App\Program;
use App;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProgramController extends Controller
{
    /**
     * Instantiate a new ProgramController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['api', 'school']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school, Vertical $vertical, Subvertical $subvertical)
    {
        $programs = DB::table('programs')->where([
		    ['subvertical_id', $subvertical->id],
		])->get();
        
        return view('programs.index', ['subvertical' => $subvertical, 'programs' => $programs, 'school' => $school, 'vertical' => $vertical]);
    }

    // Create Programs
    public function store(Request $request, Vertical $vertical, Subvertical $subvertical, Program $program) {

        $program = new Program;
        $program->name = $request->name;
        $program->education_level = $request->education_level;
        $program->school_name = $request->school_name;
        $program->vertical_name = $request->vertical_name;
        $program->subvertical_name = $request->subvertical_name;
        $program->code = $request->code;
        $program->school_id = $request->school_id;
        $program->vertical_id = $request->vertical_id;
        $program->subvertical_id = $request->subvertical_id;
        $program->special_program_type = strtolower($request->special_program_type);
        $program->save();

        return back();
    }

    public function delete(Program $program) {
        $program->delete();
        return back();
    }

    public function show(School $school, Vertical $vertical, Subvertical $subvertical, Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    // Update Program
    public function update(Request $request, Program $program) {
        
        $programupdate = Program::findOrFail($program->id);
        $programupdate->name = $request->name;
        $programupdate->code = $request->code;
        $programupdate->education_level = $request->education_level;
        $programupdate->special_program_type = strtolower($request->special_program_type);
        $programupdate->save();
        return back();
    }

    public function api(School $school, Vertical $vertical, Subvertical $subvertical, Program $program)
    {
        $program = DB::table('programs')->where([
		    ['id', $program->id],
		])->get();

        if (isset($program[0]->special_program_type)) {

        	
        	if($program[0]->special_program_type == 'combo') {
        		
				$program[0]->education_level = 'combo';
				$program[0]->vertical_name = 'combo';
				$program[0]->subvertical_name = 'combo';

				return $program;

			} else {
				return $program;
			}

        } else {
        	return $program;
        }
		 
        
    }

    public function school(School $school, Vertical $vertical, Subvertical $subvertical, Program $program)
    {
        $programs = DB::table('programs')->where([
		    ['school_id', $school->id],
		])->get();
        
        return $programs;
    }
}

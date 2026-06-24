<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuatreAnalysesRequest;
use App\Models\action_charter;
use App\Models\loi;
use App\Models\quatre_analyses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuatreAnalysesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->is_admin){
            abort(403, 'Accès refusé');
        }
        $loi = loi::latest()->first();
        return view('quatre_analyses.index', compact('loi'));
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->is_admin){
            abort(403, 'Accès refusé');
        }
        return view('quatre_analyses.create');
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuatreAnalysesRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']= Auth::id();
        $quatre_analyses = quatre_analyses::first();

        if ($quatre_analyses) {
                return redirect()->back()->with('success',"هناك تحليل رباعي موجود الرجاء التعديل فيه");
        } else {
                quatre_analyses::create($formFields);
        }
       
        return redirect()->route('quatre_analyses.indexByCharter',
        $formFields['action_charter_id'])->with('success', 'تمت إضافة التحليل الرباعي بنجاح.'); 
   
    }

    /**
     * Display the specified resource.
     */
    public function show(quatre_analyses $quatre_analyses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(quatre_analyses $quatre_analyses)
    {
      
        $quatre_analyses = quatre_analyses::latest()->first();
        $action_charter = $quatre_analyses->action_charter;
        $gouvernorat_action_charter = $action_charter->gouvernorat_id;
        $loi = loi::latest()->first();

        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $gouvernorat_action_charter) {
            abort(403);
        }

        return view( 'quatre_analyses.edit',compact('loi','quatre_analyses', 'action_charter') );
        
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuatreAnalysesRequest $request, quatre_analyses $quatre_analyses)
    {
       //
    }

    public function updateLast(QuatreAnalysesRequest $request)
    {
        $quatre_analyses = quatre_analyses::latest()->first();

        if (!$quatre_analyses) {
            return redirect()->back()->with('error', 'لا يوجد تحليل للتحديث.');
        }

        $formFields = $request->validated();

        $quatre_analyses->update($formFields);

        return redirect()->route('quatre_analyses.indexByCharter', [
            'action_charter' => $quatre_analyses->action_charter_id
        ])->with('success', 'تمت تحديث التحليل الرباعي بنجاح.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(quatre_analyses $quatre_analyses)
    {
        //
    }

    

    public function indexByCharter(action_charter $action_charter, Request $request)
    {
       if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }

        $loi = loi::latest()->first();
        $quatre_analyses = quatre_analyses::where('action_charter_id', $action_charter->id)->latest()->first();

        return view('quatre_analyses.index', compact('loi', 'action_charter','quatre_analyses'));
    }



    public function createByCharter(action_charter $action_charter)
    {

        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }
        $loi = loi::latest()->first();
        return view( 'quatre_analyses.create',compact('loi', 'action_charter') );

    }
}

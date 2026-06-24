<?php

namespace App\Http\Controllers;

use App\Http\Requests\DelegationRequest;
use App\Http\Requests\GouvernoratRequest;
use App\Models\Delegation;
use App\Models\Gouvernorat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DelegationController extends Controller
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
        $delegations = Delegation::with('gouvernorat')->paginate(10);
        return view('delegation.index', compact('delegations'));
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
        $gouvernorats = Gouvernorat::all();
        return view('delegation.create', compact('gouvernorats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DelegationRequest $request, Delegation $delegation)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        Delegation::create($formFields);
        return redirect()->route('delegation.index')->with('success', 'تم إنشاء المعتمدية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delegation $delegation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delegation $delegation)
    {
        if (!Auth::user()->is_admin) {
            checkPermission($delegation);
        }
        $gouvernorats = Gouvernorat::all();
        return view('delegation.edit', compact('delegation','gouvernorats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DelegationRequest $request, Delegation $delegation)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $delegation->update($formFields);
        return redirect()->route('delegation.index')->with('success', 'تم تعديل المعتمدية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delegation $delegation)
    {
        $delegation->delete();
        return to_route('delegation.index')->with('success', 'تم حذف المعتمدية بنجاح');
    }

    public function getByGouvernorat($gouvernorat_id)
    {
        
        $delegations = Delegation::where('gouvernorat_id', $gouvernorat_id)->get();

        return response()->json($delegations);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinancementRequest;
use App\Models\Financement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancementController extends Controller
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
        $financements = Financement::paginate(10); 
        return view('financement.index', compact('financements'));
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
        return view('financement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinancementRequest $request, Financement $financement)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        Financement::create($formFields);
        return redirect()->route('financement.index')->with('success', 'تم إنشاء التمويل بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Financement $financement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Financement $financement)
    {
        if (!Auth::user()->is_admin) {
            checkPermission($financement);
        }
        return view('financement.edit', compact('financement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinancementRequest $request, Financement $financement)
    {
        $formFields = $request->validated();
        $financement->update($formFields);
        return redirect()->route('financement.index')->with('success', 'تم تعديل التمويل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Financement $financement)
    {
        $financement->delete();
        return to_route('financement.index')->with('success', 'تمت إزالة التمويل بنجاح');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\loi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user->is_admin) {
            abort(403, 'Accès refusé');
        }

        $loi = Loi::first(); 

        return view('loi.index', compact('loi'));
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
        return view('loi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
    $request->validate([
        'description' => 'required'
        ]);
        $loi = Loi::first();

            if ($loi) {
                   return redirect()->back()->with('success',"هناك قانون موجود الرجاء التعديل فيه");
            } else {
                Loi::create([
                    'description' => $request->description,
                    'profile_id' => Auth::id(), 
                ]);
            }
    
        return redirect()->route('loi.index')->with('success', 'تم حفظ القانون بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(loi $loi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(loi $loi)
    {
         $loi = Loi::first(); 
            return view('loi.edit', compact('loi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, loi $loi)
    {
          $request->validate([
                'description' => 'required'
            ]);

            $loi->update([
                'description' => $request->description,
                'profile_id' => Auth::id(), 
            ]);

            return redirect()->route('loi.index')->with('success', 'تم تعديل القانون بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loi $loi)
    {
        //
    }
}

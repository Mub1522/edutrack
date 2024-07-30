<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::latest()->paginate(15);
        return view('admin.guardians.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guardians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:guardians',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        $guardian = Guardian::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/guardians', $image->hashName());
            $guardian->image = 'guardians/' . $image->hashName();
            $guardian->save();
        }

        session()->flash('swal', [
            'position' => 'top-end',
            'icon' => 'success',
            'title' => __('Guardian created successfully'),
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => false,
        ]);

        return redirect()->route('admin.guardians.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guardian = Guardian::findOrFail($id);
        return view('admin.guardians.edit', compact('guardian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

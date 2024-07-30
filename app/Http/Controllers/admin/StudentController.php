<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(15);
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:students',
                'birthdate' => 'required|date_format:m/d/Y',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'birthdate.required' => 'La fecha de nacimiento es obligatoria',
                'birthdate.date_format' => 'La fecha de nacimiento no es válida',
            ]
        );

        $birthdate = Carbon::createFromFormat('m/d/Y', $request->birthdate)->format('Y-m-d');
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $birthdate,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/students', $image->hashName());
            $student->image = 'students/' . $image->hashName();
            $student->save();
        }

        session()->flash('swal', [
            'position' => 'top-end',
            'icon' => 'success',
            'title' => __('Student created successfully'),
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => false,
        ]);

        return redirect()->route('admin.students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.edit', compact('student'));
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

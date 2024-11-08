<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employe.index' , compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employe.create');
    }

    // Store a new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email',
            'password' => 'required|min:5',
            'role' => 'required|string',
        ]);

        $validated['password'] = bcrypt($request->password); // Hash the password

        Employe::create($validated);

        return redirect()->route('employe.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show the edit form
    public function edit($id)
    {
        $employe = Employe::findOrFail($id); 
        return view('employe.edit', compact('employe'));
    }
    

    // Update employee data
    public function update(Request $request, Employe $employe)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email,' . $employe->id,
            'password' => 'nullable|min:5',
            'role' => 'required|string',
        ]);

        if ($request->has('password')) {
            $validated['password'] = bcrypt($request->password);
        }

        $employe->update($validated);

        return redirect()->route('employe.index')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect('employe');
    }
}

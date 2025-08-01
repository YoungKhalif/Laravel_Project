<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
<<<<<<< HEAD

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();

        // Apply search filters
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Apply sorting
        if ($request->has('sort_by')) {
            if ($request->sort_by === 'name') {
                $query->orderBy('name');
            } elseif ($request->sort_by === 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort_by === 'events') {
                $query->withCount('events')->orderBy('events_count', 'desc');
            }
        } else {
            // Default sorting
            $query->orderBy('name');
        }

        $companies = $query->withCount('events')->paginate(12);
=======
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('events')
                            ->orderBy('created_at', 'desc')
                            ->paginate(12);
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77

        return view('companies.index', compact('companies'));
    }

<<<<<<< HEAD
    /**
     * Show the form for creating a new resource.
     */
=======
    public function show(Company $company)
    {
        $company->load(['events' => function($query) {
            $query->where('status', 'active')
                  ->where('start_date', '>=', now())
                  ->orderBy('start_date', 'asc');
        }]);

        return view('companies.show', compact('company'));
    }

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function create()
    {
        return view('companies.create');
    }

<<<<<<< HEAD
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'website' => 'nullable|url',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company = Company::create($validatedData);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('companies', 'public');
            $company->update(['logo' => $logoPath]);
        }

        return redirect()->route('companies.show', $company->id)
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'website' => 'nullable|url',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company->update($validatedData);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('companies', 'public');
            $company->update(['logo' => $logoPath]);
        }

        return redirect()->route('companies.show', $company->id)
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
=======
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:companies',
            'email' => 'required|email|unique:companies',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'description' => 'required|string',
            'registration_number' => 'required|string|unique:companies',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['is_verified'] = false;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        $company = Company::create($data);

        return redirect()->route('companies.show', $company)
                        ->with('success', 'Company registered successfully! Please wait for verification.');
    }

    public function edit(Company $company)
    {
        $this->authorize('update', $company);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $this->authorize('update', $company);

        $request->validate([
            'name' => 'required|string|max:255|unique:companies,name,' . $company->id,
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'description' => 'required|string',
            'registration_number' => 'required|string|unique:companies,registration_number,' . $company->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        $company->update($data);

        return redirect()->route('companies.show', $company)
                        ->with('success', 'Company updated successfully!');
    }

    public function verify(Company $company)
    {
        $this->authorize('verify', $company);
        
        $company->update(['is_verified' => true]);

        return back()->with('success', 'Company verified successfully!');
    }

    public function unverify(Company $company)
    {
        $this->authorize('verify', $company);
        
        $company->update(['is_verified' => false]);

        return back()->with('success', 'Company verification removed!');
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}

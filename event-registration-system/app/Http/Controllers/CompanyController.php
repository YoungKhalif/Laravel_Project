<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('events')
                            ->orderBy('created_at', 'desc')
                            ->paginate(12);

        return view('companies.index', compact('companies'));
    }

    public function show(Company $company)
    {
        $company->load(['events' => function($query) {
            $query->where('status', 'active')
                  ->where('start_date', '>=', now())
                  ->orderBy('start_date', 'asc');
        }]);

        return view('companies.show', compact('company'));
    }

    public function create()
    {
        return view('companies.create');
    }

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
    }
}

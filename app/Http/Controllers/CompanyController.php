<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:companies']);
        Company::create($request->all());
        return back()->with('success', 'Company Created');
    }
}

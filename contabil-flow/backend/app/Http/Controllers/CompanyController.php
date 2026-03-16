<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $companies = Company::where('accountant_id', $user->accountant_id)->get();

        return response()->json($companies);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => 'required|string',
            'cnpj' => 'required|string|unique:companies',
            'email' => 'nullable|email',
            'phone' => 'nullable|string'
        ]);

        $data['accountant_id'] = $user->accountant_id;

        $company = Company::create($data);

        return response()->json($company, 201);
    }

    public function show($id, Request $request)
    {
        $user = $request->user();

        $company = Company::where('accountant_id', $user->accountant_id)
            ->findOrFail($id);

        return response()->json($company);
    }

    public function update($id, Request $request)
    {
        $user = $request->user();

        $company = Company::where('accountant_id', $user->accountant_id)
            ->findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|string',
            'cnpj' => 'sometimes|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string'
        ]);

        $company->update($data);

        return response()->json($company);
    }

    public function destroy($id, Request $request)
    {
        $user = $request->user();

        $company = Company::where('accountant_id', $user->accountant_id)
            ->findOrFail($id);

        $company->delete();

        return response()->json([
            'message' => 'Empresa deletada'
        ]);
    }
}
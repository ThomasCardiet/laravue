<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index() {
        return Inertia::render('Customer/Index', [
            'customers' => Customer::all()
        ]);
    }

    public function create() {
        return Inertia::render('Customer/Create');
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return Inertia::render('Customer/Edit', [
            'customer' => $customer,
        ]);
    }

    public function update($id, Request $request) {

        $customer = Customer::findOrFail($id);

        $request->validate([
            'society_description'       => ['required'],
            'society_social_reason'       => ['required'],
            'society_legal_status'    => ['required'],
            'society_capital'  => ['required'],
            'society_siret_number'  => ['required'],
            'society_naf_code'  => ['required'],
            'country'  => ['required'],
            'address'  => ['required'],
            'postal_code'  => ['required'],
            'city'  => ['required'],
        ]);

        $customer->update($request->only(
            'society_description',
            'society_social_reason',
            'society_legal_status',
            'society_capital',
            'society_siret_number',
            'society_naf_code',
            'country',
            'address',
            'postal_code',
            'city',
        ));

        return redirect()->route('customer.index');
    }

    public function store(Request $request) {
        $request->validate([
            'society_description'       => ['required'],
            'society_social_reason'       => ['required'],
            'society_legal_status'    => ['required'],
            'society_capital'  => ['required'],
            'society_siret_number'  => ['required'],
            'society_naf_code'  => ['required'],
            'country'  => ['required'],
            'address'  => ['required'],
            'postal_code'  => ['required'],
            'city'  => ['required'],
        ]);

        Customer::create($request->only(
            'society_description',
            'society_social_reason',
            'society_legal_status',
            'society_capital',
            'society_siret_number',
            'society_naf_code',
            'country',
            'address',
            'postal_code',
            'city',
        ));

        return redirect()->route('customer.index');
    }
}

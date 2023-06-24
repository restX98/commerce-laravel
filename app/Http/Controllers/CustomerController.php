<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function show() {
        $customer = Auth::user();
        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    public function login() {
        return view('customers.login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        
        if(auth('customer')->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Hai effettuato l\'accesso');
        }

        return back()->withErrors(['email' => 'Credenziali invalide'])->onlyInput("email");
    }

    public function logout(Request $request) {
        auth('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'User Logged Out!');
    }

    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'firstName' => ['required', 'min:3'],
            'lastName' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('customers', 'email')],
            'phoneNumber' => ['required', 'min:10', 'numeric', Rule::unique('customers', 'phoneNumber')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $customer = Customer::create($formFields);

        auth()->login($customer);

        return redirect('/')->with('success', 'true');
    }
}

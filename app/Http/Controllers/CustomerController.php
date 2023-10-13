<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        
        return view('customers', ['title' => 'Clientes', 'customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer-create', ['title' => 'Cadastar Novo Cliente']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        
        $customer = new Customer();
        $customer->name = $validated['name'];
        $customer->phone = $validated['phone'];

        $saved = $customer->save();

        if($saved) {
             Session::flash('customerCreateSuccess', 'Cliente cadastrado com sucesso!');
        } else {
            Session::flash('customerCreateFail', 'Ocorreu uma falha!');
        }
        return back();
    }

}

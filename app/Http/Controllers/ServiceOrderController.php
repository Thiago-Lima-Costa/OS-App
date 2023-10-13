<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = ServiceOrder::all();
        
        return view('serviceOrders', ['title' => 'Ordens de Serviço', 'orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(['id', 'name']);
        $customers = Customer::all(['id', 'name']);
        return view('serviceOrder-create', ['title' => 'Cadastar O.S.', 'users' => $users, 'customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'customer_id' => 'required',
            'product' => 'required',
            'complaint' => 'required',
            'value' => 'required|numeric',
            'diagnosis' => 'required',
            
        ]);
        
        $order = new ServiceOrder();
        $order->user_id = $validated['user_id'];
        $order->customer_id = $validated['customer_id'];
        $order->product = $validated['product'];
        $order->complaint = $validated['complaint'];
        $order->value = $validated['value'];
        $order->diagnosis = $validated['diagnosis'];

        $saved = $order->save();

        if($saved) {
            Session::flash('soCreateSuccess', 'Ordem de Serviço cadastrada com sucesso!');
        } else {
            Session::flash('soCreateFail', 'Ocorreu uma falha!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = ServiceOrder::find($id);
        return view('serviceOrder', ['title' => 'Ordem de Serviço', 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = ServiceOrder::find($id);
        $users = User::all(['id', 'name']);
        $customers = Customer::all(['id', 'name']);
        return view('serviceOrder-edit', ['title' => 'Editar O.S.', 'order' => $order, 'users' => $users, 'customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'customer_id' => 'required',
            'product' => 'required',
            'complaint' => 'required',
            'value' => 'required|numeric',
            'diagnosis' => 'required',
            
        ]);
    
	    $order = ServiceOrder::find($id);
        $updated = $order->update($validated);
        if($updated) {
            Session::flash('soUpdateSuccess', 'Ordem de Serviço atualizada com sucesso!');
        } else {
            Session::flash('soUpdateFail', 'Ocorreu uma falha!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = ServiceOrder::destroy($id);
        
        if($deleted) {
            Session::flash('delSoSuccess', 'Ordem de Serviço excluída com sucesso!');
        } else {
            Session::flash('delSoFail', 'Ocorreu uma falha!');
        }
        return back();
    }
}

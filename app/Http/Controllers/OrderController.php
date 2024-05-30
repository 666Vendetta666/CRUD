<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage; 
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View 
    {
        $buscarpor = $request->get('buscarpor');
        $query = Order::query();
        if ($buscarpor) { 
            $query->where(function ($query) use ($buscarpor) {
                $query->where('id', 'like', '%' . $buscarpor . '%')
                      ->orWhere('client_id', 'like', '%' . $buscarpor . '%') 
                      ->orWhere('items', 'like', '%' . $buscarpor . '%')
                      ->orWhere('brands', 'like', '%' . $buscarpor . '%')
                      ->orWhere('amounts', 'like', '%' . $buscarpor . '%')
                      ->orWhere('prices', 'like', '%' . $buscarpor . '%');
            });
        }
        $orders = $query->paginate();
        $i = ($orders->currentPage() - 1) * $orders->perPage();

        return view('order.index', compact('orders', 'buscarpor'))
            ->with('i', ($request->input('page', 1) - 1) * $orders->perPage());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View 
    {
        $order = new Order();
        $client = Client::pluck('id','name'); 
        return view('order.create', compact('order','client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): RedirectResponse 
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('order_images', 'public');
            $validatedData['image'] = $path; 
        }
        Order::create($validatedData); 
        return Redirect::route('orders.index') 
            ->with('success', 'Pedido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View 
    {
        $order = Order::find($id);

        return view('order.show', compact('order'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View  
    {
        $order = Order::find($id); 
        $client = Client::pluck('id','name'); 
        return view('order.edit', compact('order','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(OrderRequest $request, Order $order): RedirectResponse
{
    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        if ($order->image) {
            Storage::disk('public')->delete($order->image); 
        }
        $validatedData['image'] = $request->file('image')->store('order_images', 'public'); 
    }
    $order->update($validatedData);
    return Redirect::route('orders.index')
        ->with('success', 'Pedido actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse 
    {
        Order::find($id)->delete();

        return Redirect::route('orders.index')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}

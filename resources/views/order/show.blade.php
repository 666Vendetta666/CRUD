@extends('layouts.app')

@section('template_title')
    {{ $order->name ?? __('Show') . " " . __('Order') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('orders.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>ID del Cliente:</strong>
                                    {{ $order->client_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Producto:</strong>
                                    {{ $order->items }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Imagen del Producto:</strong>
                                    <td>
                                        @if($order->image)
                                            <img src="{{ asset('storage/' . $order->image) }}" alt="Imagen del Pedido" style="max-width: 100px; max-height: 100px;">
                                             @else
                                            Sin imagen
                                         @endif
                                     </td>
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $order->brands }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $order->amounts }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:$</strong>
                                    {{ $order->prices }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

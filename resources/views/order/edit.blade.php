@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Order
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Order</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('orders.update', $order->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @if($order->image)
                                <div class="form-group">
                                    <label for="image">Imagen actual:</label><br>
                                    <img src="{{ asset('storage/' . $order->image) }}" alt="Imagen del Pedido" style="max-width: 100px; max-height: 100px;"><br>
                                </div>
                            @endif
                            @include('order.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

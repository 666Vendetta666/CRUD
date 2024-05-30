<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="client_id" class="form-label">{{ __('Cliente') }}</label>
            <select  name="client_id" class="form-control @error('client_id') is-invalid @enderror" value="{{ old('client_id', $order?->client_id) }}" id="client_id">
                @foreach ($client as $clientkey =>$valor)
                <option value ="{{$valor}}">{{$clientkey}}</option>
                @endforeach
            </select>
            {!! $errors->first('client_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="items" class="form-label">{{ __('Producto') }}</label>
            <input type="text" name="items" class="form-control @error('items') is-invalid @enderror" value="{{ old('items', $order?->items) }}" id="items" placeholder="Items">
            {!! $errors->first('items', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imagen') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="brands" class="form-label">{{ __('Marca') }}</label>
            <input type="text" name="brands" class="form-control @error('brands') is-invalid @enderror" value="{{ old('brands', $order?->brands) }}" id="brands" placeholder="Brands">
            {!! $errors->first('brands', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amounts" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="amounts" class="form-control @error('amounts') is-invalid @enderror" value="{{ old('amounts', $order?->amounts) }}" id="amounts" placeholder="Amounts">
            {!! $errors->first('amounts', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="prices" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="prices" class="form-control @error('prices') is-invalid @enderror" value="{{ old('prices', $order?->prices) }}" id="prices" placeholder="Prices">
            {!! $errors->first('prices', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Listo') }}</button>
    </div>
</div>
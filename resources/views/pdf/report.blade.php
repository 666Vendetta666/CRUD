<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte PDF de Clientes y Pedidos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte PDF de Clientes y Pedidos</h1>
    <h2>Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->lastname }}</td>
                <td>{{ $client->addres }}</td>
                <td>{{ $client->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Pedidos</h2>
    <table>
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>No.Pedido</th>                        
                <th>Cliente</th>
                <th>Producto</th>
                <th>Imagen</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>                                            
                <td>{{ $order->client_id }}</td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->client->name }}</td>
                <td>{{ $order->items }}</td>
                <td>
                    @if($order->image)
                    <img src="{{ public_path('storage/' . $order->image) }}" alt="Imagen del Pedido" style="max-width: 100px; max-height: 100px;">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>{{ $order->brands }}</td>  
                <td>{{ $order->amounts }}</td>
                <td>{{ $order->prices }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
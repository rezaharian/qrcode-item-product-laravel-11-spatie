<!DOCTYPE html>
<html>

<head>
    <title>Product Labels</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body onload="window.print();">
    <h1>Product Labels</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        {{ $product->qr_code_url }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

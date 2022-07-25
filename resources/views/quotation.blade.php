<html>
    <head>
        <style>
            caption {
                padding: 8px;
                caption-side: bottom;
            }
        </style>
    </head>
    <body>
        <div>
            <h2 style="text-align: center;">Nombre de la Empresa</h2>
        </div>
        <div>
            <p>
                {{ $data->branch->type_branch}} {{ $data->branch->name_branch }}
                <br>
                {{ $data->branch->address_branch }}
            </p>
        </div>
        <div>
            <p>
                {{ date('d-m-Y', strtotime($data->date_quotation)); }}
            </p>
        </div>

        <table style="width:100%">
            <tr>
                <th align="">
                    Código
                </th>
                <th align="left">
                    Detalle
                </th>
                <th align="">
                    Cantidad
                </th>
                <th align="">
                    Precio Unitario
                </th>
                <th align="">
                    Sub - Total
                </th>
            </tr>
            @foreach ($data->productQuotation as $productQuotation)
            <tr>
                <td align="center">
                    {{ $productQuotation->id }}
                </td>
                <td>
                    {{ $productQuotation->product->model_product }}
                    {{ $productQuotation->product->format_product }}
                </td>
                <td align="center">
                    {{ $productQuotation->quantity }}
                </td>
                <td align="center">
                    {{ $productQuotation->unit_price }}
                </td>
                <td align="center">
                    {{ $productQuotation->total_price }} Bs.
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th align="right">
                    Total
                </th>
                <th>
                    {{$data->price_quotation}} Bs.
                </th>
            </tr>
            <caption style="caption-side: bottom;">
                Valido hasta el {{ date('d-m-Y', strtotime($data->expiration_date)); }}
            </caption>
        </table>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }

        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }

        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>CCIT STORE</h2>
            <small>FTUI
            </small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>Order Number</li>
                    <li>Cashier</li>
                    <li>Date/Time</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order->no_order }} </li>
                    <li> {{ $order->nama_kasir }} </li>
                    <li> {{ date('Y-m-d : H:i:s', strtotime($order->created_at)) }} </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
            <div style="text-align: left;">Product Name</div>
            <div>Price/Product</div>
            <div>Total</div>
        </div>
        @foreach ($order->productOrder as $item)
            <div class="flex-container" style="text-align: right;">
                @php
                    if(!empty($item->namaProduct->nama_product)) {
                        $arr_name = explode(' ', $item->namaProduct->nama_product);
                        $name = $arr_name[0];
                    } elseif ($item->namaProduct->nama_product != '') {
                            $name = $item->namaProduct->nama_product;
                    } else {
                        $name = 'there';
                    }
                @endphp
                <div style="text-align: left;">{{ $item->qty }}x {{ $name }}</div>
                <div>Rp {{ number_format($item->namaProduct->harga_product) }} </div>
                <div>Rp {{ number_format($item->total) }} </div>
            </div>
        @endforeach
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Grand Total</li>
                    <li>Payment</li>
                    <li>Change</li>
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li>Rp {{ number_format($order->grand_total) }} </li>
                    <li>Rp {{ number_format($order->pembayaran) }}</li>
                    <li>Rp {{ number_format($order->kembalian) }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Thank You</h3>
            <p>For Purchasing at CCIT Store</p>
        </div>
    </div>
</body>
</html>

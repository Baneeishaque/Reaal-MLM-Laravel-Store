<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - Order #{{ $orderDetails['id'] }}</title>
    <style>
        /* Add some styling for the PDF */
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Order #{{ $orderDetails['id'] }} Invoice</h2>
<table class="table">
    <tr>
        <th>Order Date</th>
        <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>
    </tr>
    <tr>
        <th>Order Status</th>
        <td>{{ $orderDetails['order_status'] }}</td>
    </tr>
    <tr>
        <th>Order Total</th>
        <td>INR{{ $orderDetails['grand_total'] }}</td>
    </tr>
    <tr>
        <th>Shipping Charges</th>
        <td>INR{{ $orderDetails['shipping_charges'] }}</td>
    </tr>
    @if ($orderDetails['coupon_code'])
        <tr>
            <th>Coupon Code</th>
            <td>{{ $orderDetails['coupon_code'] }}</td>
        </tr>
        <tr>
            <th>Coupon Amount</th>
            <td>INR{{ $orderDetails['coupon_amount'] }}</td>
        </tr>
    @endif
    @if ($orderDetails['courier_name'])
        <tr>
            <th>Courier Name</th>
            <td>{{ $orderDetails['courier_name'] }}</td>
        </tr>
        <tr>
            <th>Tracking Number</th>
            <td>{{ $orderDetails['tracking_number'] }}</td>
        </tr>
    @endif
    <tr>
        <th>Payment Method</th>
        <td>{{ $orderDetails['payment_method'] }}</td>
    </tr>
</table>

<h3>Order Products</h3>
<table class="table">
    <thead>
    <tr>
        <th>Product Code</th>
        <th>Product Name</th>
        <th>Product Size</th>
        <th>Product Color</th>
        <th>Product Qty</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($orderDetails['orders_products'] as $product)
        <tr>
            <td>{{ $product['product_code'] }}</td>
            <td>{{ $product['product_name'] }}</td>
            <td>{{ $product['product_size'] }}</td>
            <td>{{ $product['product_color'] }}</td>
            <td>{{ $product['product_qty'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h3>Delivery Address</h3>
<table class="table">
    <tr>
        <th>Name</th>
        <td>{{ $orderDetails['name'] }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $orderDetails['address'] }}</td>
    </tr>
    <tr>
        <th>City</th>
        <td>{{ $orderDetails['city'] }}</td>
    </tr>
    <tr>
        <th>State</th>
        <td>{{ $orderDetails['state'] }}</td>
    </tr>
    <tr>
        <th>Country</th>
        <td>{{ $orderDetails['country'] }}</td>
    </tr>
    <tr>
        <th>Pincode</th>
        <td>{{ $orderDetails['pincode'] }}</td>
    </tr>
    <tr>
        <th>Mobile</th>
        <td>{{ $orderDetails['mobile'] }}</td>
    </tr>
</table>

<h3>GSTIN: 32NCDPS4406N1Z5</h3>
<h3>REAAL PLATFORM</h3>

</body>
</html>

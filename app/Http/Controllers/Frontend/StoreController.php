<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreProduct;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;

class StoreController extends Controller
{
    public function index()
    {
        $products = StoreProduct::where('status', 'active')->orderBy('sort_order')->paginate(12);
        $settings = Setting::first();
        return view('frontend.store.index', compact('products', 'settings'));
    }

    public function show($slug)
    {
        $product  = StoreProduct::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $settings = Setting::first();
        return view('frontend.store.show', compact('product', 'settings'));
    }

    public function order(Request $request, $slug)
    {
        $product = StoreProduct::where('slug', $slug)->where('status', 'active')->firstOrFail();

        $data = $request->validate([
            'customer_name'          => 'required|string|max:150',
            'customer_email'         => 'nullable|email|max:150',
            'customer_phone'         => 'required|string|max:30',
            'payment_method'         => 'required|in:mpesa,whatsapp',
            'mpesa_transaction_code' => 'nullable|string|max:50',
            'quantity'               => 'required|integer|min:1',
            'customer_notes'         => 'nullable|string|max:500',
        ]);

        $quantity = $data['quantity'];
        $subtotal = $product->price * $quantity;

        $order = Order::create([
            'order_number'           => Order::generateOrderNumber(),
            'customer_name'          => $data['customer_name'],
            'customer_email'         => $data['customer_email'] ?? null,
            'customer_phone'         => $data['customer_phone'],
            'payment_method'         => $data['payment_method'],
            'mpesa_transaction_code' => $data['mpesa_transaction_code'] ?? null,
            'total_amount'           => $subtotal,
            'status'                 => 'pending',
            'customer_notes'         => $data['customer_notes'] ?? null,
        ]);

        OrderItem::create([
            'order_id'     => $order->id,
            'product_id'   => $product->id,
            'product_name' => $product->title,
            'quantity'     => $quantity,
            'unit_price'   => $product->price,
            'subtotal'     => $subtotal,
            'created_at'   => now(),
        ]);

        return redirect()->route('store.order.success')->with('order_number', $order->order_number);
    }

    public function orderSuccess()
    {
        $orderNumber = session('order_number');
        return view('frontend.store.order-success', compact('orderNumber'));
    }
}

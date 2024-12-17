<?php

namespace App\Http\Controllers;

use App\Models\ShopCart;
use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class ShopCartController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $data = ShopCart::where('user_id', Auth::id())->get();
        return view('home.user.shopcart', [
            'setting' => $setting,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $data = ShopCart::where('product_id', $id)->where('user_id', Auth::id())->first(); //check product for user
        if ($data) {
            $data->quantity = $data->quantity + $request->input('quantity');
        } else {
            $data = new ShopCart();
            $data->product_id = $request->input('product_id');
            $data->user_id = Auth::id();
            $data->quantity = $request->input('quantity');
        }
        $data->save();
        return redirect()->back()->with('info', 'Produk Ditambahkan ke Keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $data = ShopCart::where('product_id', $id)->where('user_id', Auth::id())->first(); //check product for user
        if ($data) {
            $data->quantity = $data->quantity + 1;
        } else {
            $data = new ShopCart();
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = 1;
        }
        $data->save();
        return redirect()->back()->with('info', 'Produk Ditambahkan ke Keranjang');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $datalist = ShopCart::where('user_id', Auth::id())->get(); // Menggunakan $datalist
        $total = $datalist->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('home.user.order', [
            'total' => $total,
            'datalist' => $datalist // Mengirim $datalist ke view
        ]);
    }
    public function storeorder(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);

        session([
            'order_data' => [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone
            ]
        ]);

        $datalist = ShopCart::where('user_id', Auth::id())->get();
        $total = $datalist->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        if ($total <= 0) {
            \Log::error('Total order tidak valid:', ['total' => $total]);
            return back()->with('error', 'Total order tidak valid.');
        }

        \Log::info('Menyimpan order baru:', ['user_id' => Auth::id(), 'total' => $total]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->total = $total;
        $order->pembayaran = 'Unpaid';
        $order->save();

        // Menyimpan setiap item dalam keranjang sebagai OrderProduct
        foreach ($datalist as $rs) {
            $data2 = new OrderProduct();
            $data2->user_id = Auth::id();
            $data2->product_id = $rs->product_id;
            $data2->order_id = $order->id;
            $data2->price = $rs->product->price;
            $data2->quantity = $rs->quantity;
            $data2->amount = $rs->quantity * $rs->product->price;
            $data2->save();
        }

        // Generate Snap Token
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ],
            'item_details' => $datalist->map(function ($item) {
                return [
                    'id' => $item->product_id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'name' => $item->product->title
                ];
            })->toArray(),
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            \Log::error('Error generating snapToken:', $e->getMessage());
            return back()->with('error', 'Gagal menghasilkan token: ' . $e->getMessage());
        }

        // Check if snapToken is generated
        if (empty($snapToken)) {
            \Log::error('Snap token is empty');
            return back()->with('error', 'Token pembayaran tidak dapat dihasilkan.');
        }



        // Check if order is saved
        if (!$order->exists) {
            \Log::error('Order not saved to database');
            return back()->with('error', 'Order tidak dapat disimpan.');
        }

        return view('home.user.storeorder', compact('snapToken', 'datalist', 'total'));
    }
    public function ordercomplete()
    {
        return view('home.user.ordercomplete');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ShopCart::find($id);
        $data->quantity = $request->input('quantity');
        $data->save();
        return redirect()->back()->with('success', 'Kuantitas Produk Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShopCart::find($id);
        $data->delete();
        return redirect()->back()->with('info', 'Produk Dihapus Dari Keranjang');
    }

    public function callback(Request $request){
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;

        $signature = hash('sha512', $orderId.$statusCode.$grossAmount.'SB-Mid-server-JjeWxo9SeRZTeUCj6CPv-KQa');

        Log::info('incoming-notification', $request->all());
        if ($signature != $request->signature_key) {
            return response()->json(['message' => 'invalid signature'], 400);
        }

        $transaction = Order::find($request->order);
        if ($transaction) {
            $transaction->status = 'Paid';
            $transaction->save();

            return response()->json(['message' => 'success']);
        }
    }
}

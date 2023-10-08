<?php

namespace App\Http\Controllers;


use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get all products
        $products = Product::all();

        // cart

        $cart = session()->get('cart');


        
        return view('home', compact('products', 'cart'));
        
    }

    public function addToCart(Request $request)
    {

        $product = Product::find($request->product_id);
        $quantity = $request->quantity;

        $cart = session()->get('cart');

        if(!$cart) {

            $cart = [
                    $product->id => [
                        "productid" => $product->id,
                        "quantity" => $quantity,
                    ]
            ];

            session()->put('cart', $cart);
        } else {
                
                // if cart not empty then check if this product exist then increment quantity
    
                if(isset($cart[$product->id])) {
    
                    $cart[$product->id]['quantity']++;
    
                    session()->put('cart', $cart);
    
                } else {
    
                    // if item not exist in cart then add to cart with quantity = 1
    
                    $cart[$product->id] = [
                        "productid" => $product->id,
                        "quantity" => $quantity,
                    ];
    
                    session()->put('cart', $cart);
        
                }
        }
    }

    public function removeFromCart(Request $request)
    {
        $product_id = $request->product_id;

        $cart = session()->get('cart');

        if(isset($cart[$product_id])) {

            // delete item from cart

            unset($cart[$product_id]);
        }

        session()->put('cart', $cart);

        $cartafter = session()->get('cart');

    }
    public function checkout()
    {
        $cart = session()->get('cart');

        return view('checkout', compact('cart'));
    }
    
public function preparePayment(Request $request)
{


    $payment = Mollie::api()->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => number_format($request->price, 2, '.', ''), // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        "description" => "Order #{$request->order_id}",
        "redirectUrl" => route('order.success'),
        "webhookUrl" => route('webhooks.mollie'),
        "metadata" => [
            "order_id" => $request->order_id,
        ],
    ]);

    // redirect customer to Mollie checkout page
    return redirect($payment->getCheckoutUrl(), 303);
}

/**
 * After the customer has completed the transaction,
 * you can fetch, check and process the payment.
 * This logic typically goes into the controller handling the inbound webhook request.
 * See the webhook docs in /docs and on mollie.com for more information.
 */

public function handleWebhookNotification(Request $request) {
    $paymentId = $request->input('id');
    $payment = Mollie::api()->payments->get($paymentId);

    if ($payment->isPaid())
    {
        echo 'Payment received.';
        // Do your thing ...
    }
}

public function paymentSuccess()
{
    $cart = session()->get('cart');

    session()->forget('cart');

    return view('success', compact('cart'));
}

}

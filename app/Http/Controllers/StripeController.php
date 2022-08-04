<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\MadePurchase;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeController extends Controller
{

    public function processStripeSuccess(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_KEY'));

        if (!session()->has('stripe_payment_intent')) {
            return back();
        }

        try {


            $payment_intent = $stripe->paymentIntents->capture(
                session()->get('stripe_payment_intent')
            );

            $data = $payment_intent['charges']['data'][0];

            // $stripe = new \Stripe\StripeClient(
            //     env('STRIPE_KEY')
            // );

            $customer = $stripe->customers->retrieve(
                $data['customer'],
                []
            );

            // dd($customer);

            //  dd($data);

            // foreach ($itemsList as $items) {
            //     foreach ($items as $item) {
            //         // $orderedItems[] = $item['item'];
            //     }
            // }
            //dd($orderedItems);

            // stripe might unique id
            // $data['created']

            $charge_id = $data['id'];




            // foreach ($request->session()->get('cart') as $items) {
            //     // $itemsList[] = $item;
            //     foreach ($items as $item) {
            //         dd($item['qty']);
            //     }
            // }


            // Insert into orders table
            $order = Order::create([
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'billing_email' => $data['billing_details']['email'],
                'billing_name' => $data['billing_details']['name'],
                'billing_address' => $data['billing_details']['address']['line1'],
                'billing_country' => $data['billing_details']['address']['country'],
                'billing_city' => $data['billing_details']['address']['city'],
                'billing_postalcode' => $data['billing_details']['address']['postal_code'],
                'billing_phone' => $customer['phone'],
                'billing_name_on_card' => null,
                'billing_discount' => 0,
                'billing_discount_code' => null,
                'billing_subtotal' => $data['amount'],
                'billing_tax' => 0,
                'billing_total' => 0,
                'error' => null,
            ]);

            // dd($request->session()->get('cart'));

            // Insert into order_product table
            $CartItems = $request->session()->get('cart')->items;
            foreach ($CartItems as $item) {

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['item']->id,
                    'quantity' => $item['qty'],
                    'price' => $item['item']->price
                ]);

                $productsold = Product::find($item['item']->id);
                $productsold->quantity_sold += $item['qty'];
                $productsold->save();
            }

            // dd($order, $request->session()->get('cart'));


            // return $order;
            Mail::to($data['billing_details']['email'])->send(new MadePurchase($CartItems, $order, $request->session()->get('cart')));

            session()->forget('stripe_payment_intent');

            // session()->forget('cart');

            session()->put('payment_method', ['name' => 'stripe', 'id' => $charge_id]);



            return back()->with('success', 'Payment is successful, we have sent you an email with all the details');
        } catch (\Exception $e) {
            return back()->withErrors('Error, try again' . $e);
        }
    }

    public function stripeCheckout(Request $request)
    {
        $cartArray = array();

        foreach (session()->get('cart')->items as $item) {
            $cartArray[] = [
                'price_data' => [
                    'currency' => 'EUR',
                    'unit_amount' => $item['price'] / $item['qty'],
                    'product_data' => [
                        'name' => $item['item']->name,
                    ],
                ],

                'quantity' => $item['qty'],
            ];
        }


        try {
            Stripe::setApiKey(env('STRIPE_KEY'));
            $currency_code = 'EUR';
            $amount = $request->amount;



            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [$cartArray],

                'shipping_address_collection' => [
                    'allowed_countries' => ['US', 'CA', 'LT', 'DE', 'PL'],
                ],
                'shipping_options' => [
                    [
                        'shipping_rate_data' => [
                            'type' => 'fixed_amount',
                            'fixed_amount' => [
                                'amount' => 1000,
                                'currency' => 'EUR',
                            ],
                            'display_name' => 'LP express shipping',
                            // Delivers between 5-7 business days
                            'delivery_estimate' => [
                                'minimum' => [
                                    'unit' => 'business_day',
                                    'value' => 14,
                                ],
                                'maximum' => [
                                    'unit' => 'business_day',
                                    'value' => 30,
                                ],
                            ]
                        ]
                    ],
                ],

                'phone_number_collection' => [
                    'enabled' => true,
                ],

                'metadata' => [
                    'order_id' => '6735',
                    'shipping_address' => 'New York South Street 214'
                ],

                'customer_email' => $request->email,
                'mode' => 'payment',
                'payment_intent_data' => [
                    'capture_method' => 'manual',
                ],



                'success_url' => route('stripe-success'),
                'cancel_url' => url('/cart/checkout'),
            ]);

            $stripe_session = $session['id'];

            session()->put('stripe_payment_intent', $session['payment_intent']);


            return response()->json($stripe_session);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}

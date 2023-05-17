<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\msg;
use App\Models\Newsletters;
use Session;

use Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductFeatured;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Twilio\Rest\Client;

class HomeController extends Controller
{

    public function index()
    {

        if (Auth::id()) {
            $id = Auth::user()->id;
            $product = Product::paginate(8);
            $productfeatured = ProductFeatured::paginate(8);
            $total_cart = Cart::where('user_id', '=', $id)->get()->count();

            return view('home.userpage', compact('productfeatured', 'product', 'total_cart'));
        } else {
            $product = Product::paginate(8);
            $productfeatured = ProductFeatured::paginate(8);
            return view('home.userpage', compact('productfeatured', 'product'));
        }
    }



    public function redirect(Request $request)
    {
        $usertype = Auth::user()->usertype;

        $total_cart = 0;
        if ($usertype == '1') {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $total_featured_product = ProductFeatured::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }
            $total_deliverd = Order::where('delivery_status', '=', 'deliverd')->get()->count();

            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact(
                'total_product',
                'total_featured_product',
                'total_order',
                'total_user',
                'total_revenue',
                'total_deliverd',
                'total_processing'
            ));
        } else if ($usertype == '0') {
            $id = Auth::user()->id;
            $cart = Cart::all();
            $total_cart = Cart::where('user_id', '=', $id)->get()->count();

            $username = User::all();
            $product = Product::paginate(8);
            $productfeatured = ProductFeatured::paginate(8);
            return view('home.userpage', compact(
                'productfeatured',
                'product',
                'username',
                'total_cart'
            ));
        } else {

            $username = User::all();

            $product = Product::paginate(8);
            $productfeatured = ProductFeatured::paginate(8);
            return view('home.userpage', compact(
                'productfeatured',
                'product',
                'username',
                'total_cart'
            ));
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


    public function product_details($id)
    {
        if (Auth::id()) {
            $idc = Auth::user()->id;

            $productfeatured = ProductFeatured::find($id);
            $product = ProductFeatured::paginate(8);
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            return view('home.product_details', compact('product', 'productfeatured', 'total_cart'));
        } else {
            $productfeatured = ProductFeatured::find($id);
            $product = ProductFeatured::paginate(8);

            return view('home.product_details', compact('product', 'productfeatured'));
        }
    }


    public function product_details_first($id)
    {
        if (Auth::id()) {
            $idc = Auth::user()->id;

            $productfeatured = Product::find($id);
            $product = ProductFeatured::paginate(8);
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            return view('home.product_details_first', compact('product', 'productfeatured', 'total_cart'));
        } else {


            $productfeatured = Product::find($id);
            $product = ProductFeatured::paginate(8);

            return view('home.product_details_first', compact('product', 'productfeatured', 'total_cart'));
        }
    }






    public function add_cart(Request $request, $id)
    {

        if (ProductFeatured::find($id)) {
            if (Auth::id()) {
                $user = Auth::user();
                $product = ProductFeatured::find($id);

                $cart = new Cart;

                //    user DAta for user data base
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->city = $user->city;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                //    product DAta



                $cart->product_title = $product->title;


                $product1 = $request->quantity;
                if ($product1 > '0') {
                    $cart->quantity = $request->quantity;


                    if ($product->discount_price) {
                        $cart->price = $product->discount_price * $request->quantity;
                        $cart->first_price = $product->discount_price;
                    } else {

                        $cart->price = $product->price * $request->quantity;
                        $cart->first_price = $product->price;
                    }
                } else {

                    $cart->quantity = $request->quantity + 1;



                    // check discuent price or not\
                    if ($product->discount_price) {
                        $cart->price = $product->discount_price * 1;
                        $cart->first_price = $product->discount_price;
                    } else {

                        $cart->price = $product->price * 1;
                        $cart->first_price = $product->price;
                    }
                }



                $cart->image1 = $product->image1;

                $cart->product_id = $product->id;

                //  from form add cart


                $cart->save();


                Alert::success('Product Cart Successfully', 'We have added product to cart.');

                return redirect()->back();
            } else {
                return redirect('login');
            }
        } else if (Product::find($id)) {
            if (Auth::id()) {
                $user = Auth::user();
                $product = Product::find($id);

                $cart = new Cart;

                //    user DAta for user data base
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->city = $user->city;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                //    product DAta



                $cart->product_title = $product->title;


                // check discuent price or not\
                $product1 = $request->quantity;
                if ($product1 > '0') {
                    $cart->quantity = $request->quantity;


                    if ($product->discount_price) {
                        $cart->price = $product->discount_price * $request->quantity;
                        $cart->first_price = $product->discount_price;
                    } else {

                        $cart->price = $product->price * $request->quantity;
                        $cart->first_price = $product->price;
                    }
                } else {

                    $cart->quantity = $request->quantity + 1;



                    // check discuent price or not\
                    if ($product->discount_price) {
                        $cart->price = $product->discount_price * 1;
                        $cart->first_price = $product->discount_price;
                    } else {

                        $cart->price = $product->price * 1;
                        $cart->first_price = $product->price;
                    }
                }

                $cart->image1 = $product->image1;

                $cart->product_id = $product->id;

                //  from form add cart

                $cart->save();

                Alert::success('Product Cart Successfully', 'We have added product to cart.');
                return redirect()->back();
            } else {
                return redirect('login');
            }
        }
    }

    public function show_cart(Request $request)
    {
        if (Auth::id()) {




            $username = Auth::user()->name;
            $userphone = Auth::user()->phone;
            $usercity = Auth::user()->city;
            $useraddress = Auth::user()->address;
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $id)->get();
            $total_cart = Cart::where('user_id', '=', $id)->get()->count();



            return view('home.show_cart', compact('cart', 'username', 'userphone', 'usercity', 'useraddress', 'id', 'total_cart'));
        } else {
            return redirect('login');
        }
    }




    public function delete_product($id)
    {
        $data = Cart::find($id);
        $data->delete();

        Alert::warning('Product Deleted!', 'We have add Shop Any Thing more.');

        return redirect()->back();
    }



    public function cash_order(Request $request)
    {
        // if($totalprice > '0')
        // {


        if ($request->totalprice) {
            $user = Auth::user();
            $userid = $user->id;


            $data = Cart::where('user_id', '=', $userid)->get();



            foreach ($data as $data) {
                $order = new Order;

                $order->name = $data->name;

                $order->email = $data->email;

                $order->city = $data->city;

                $order->phone = $data->phone;

                $order->address = $data->address;

                $order->user_id = $data->user_id;

                $order->product_title = $data->product_title;

                $order->price = $data->price;

                $order->quantity = $data->quantity;

                $order->image1 = $data->image1;

                $order->product_id = $data->product_id;

                $order->pyment_status = 'cash on delivery';

                $order->delivery_status = 'processing';

                $order->save();



                $cart_id = $data->id;

                $cart = Cart::find($cart_id);

                $cart->delete();
            }

            Alert::success('Order Receved', 'You is confirm soon!');

            return redirect()->back();
        } else {
            Alert::warning('Cart Not Avilible', 'You Have Not Ant thing Parchase!');


            return redirect()->back();
        }
    }





    public function cash_order_order(Request $request)
    {
        // if($totalprice > '0')
        // {


        if (Auth::id() && $request->totalprice && $request->phonenum) {
            $user = Auth::user();
            $userid = $user->id;

            $data = Cart::where('user_id', '=', $userid)->get();

            foreach ($data as $data) {
                $order = new Order;


                $order->name = $data->name;

                $order->email = $data->email;

                $order->city = $data->city;

                $order->phone = $request->phonenum;

                $order->address = $data->address;

                $order->user_id = $data->user_id;

                $order->product_title = $data->product_title;

                $order->price = $data->price;

                $order->quantity = $data->quantity;

                $order->image1 = $data->image1;

                $order->product_id = $data->product_id;

                $order->pyment_status = 'cash on delivery';

                $order->delivery_status = 'processing';

                $order->save();



                $cart_id = $data->id;

                $cart = Cart::find($cart_id);

                $cart->delete();
            }

            Alert::success('Order Receved', 'Deliverd soon!');


            return redirect('shop');
        }
        else {

            Alert::warning('Register Your Mobile Number', 'To Save Your Product');

            return redirect()->back();

        }
    }



    public function stripe($totalprice)
    {
        if (Auth::id()) {


            if ($totalprice > '0') {
                $idc = Auth::user()->id;
                $total_cart = Cart::where('user_id', '=', $idc)->get()->count();
                return view('home.stripe', compact('totalprice', 'total_cart'));
            } else {
                Alert::warning('Cart Not Avilible', 'You Have Not Ant thing Parchase!');

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }
    }



    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Payment!"
        ]);



        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new Order;

            $order->name = $data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->image1 = $data->image1;

            $order->product_id = $data->product_id;

            $order->pyment_status = 'Paid';

            $order->delivery_status = 'processing';

            $order->save();



            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();
        }



        Alert::success('Payment successful!', 'Thank You.');

        Session::flash('success', 'Payment successful!');

        return back();
    }



    public function shop()
    {
        if (Auth::id()) {


            $idc = Auth::user()->id;
            $product = Product::paginate(16);
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();
            return view('home.show', compact('product', 'total_cart'));
        } else {
            $product = Product::paginate(16);

            return view('home.show', compact('product'));
        }
    }

    public function adressupdate($id)
    {
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        $usercity = Auth::user()->city;
        $useraddress = Auth::user()->address;

        return view('home.adressupdate', compact('username', 'usercity', 'useraddress', 'userid'));
    }

    public function address_update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->city = $request->city;
        $user->address = $request->address;

        $user->save();

        // $username = Auth::user()->name;
        // $userphone = Auth::user()->phone;
        // $usercity = Auth::user()->city;
        // $useraddress = Auth::user()->address;
        // $id = Auth::user()->id;
        // $total_cart = Cart::where('user_id', '=', $id)->get()->count();


        // $cart = Cart::where('user_id', '=', $id)->get();

        // return view('home.show_cart', compact('cart', 'username', 'userphone', 'usercity', 'useraddress', 'id', 'total_cart'))
        //     ->with('message', 'Address is Updated');
        Alert::success('Address is updated', 'Thank You.');

        return redirect('show_cart');
    }

    public function orderdetials()
    {
        if (Auth::id()) {
            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            $user = Auth::user();

            $userid = $user->id;

            $order = Order::where('user_id', '=', $userid)->get();

            return view('home.orderdetials', compact('order', 'total_cart'));
        } else {
            return redirect('login');
        }
    }


    public function order_cencel($id)
    {
        $data = Order::find($id);
        $data->delete();

        Alert::warning('Product Cencel!', 'We have add Shop Any Thing more.');


        return redirect()->back()->with('message', 'Product Removed');
    }

    public function blog()
    {
        if (Auth::id()) {


            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            $blog = Blog::paginate(6);
            return view('home.blog', compact('blog', 'total_cart'));
        } else {
            $blog = Blog::paginate(6);
            return view('home.blog', compact('blog'));
        }
    }


    public function about()
    {
        if (Auth::id()) {


            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            return view('home.about', compact('total_cart'));
        } else {
            return view('home.about');
        }
    }


    public function contact()
    {
        if (Auth::id()) {

            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();


            return view('home.contact', compact('total_cart'));
        } else {
            return view('home.contact');
        }
    }

    public function incress_quantity(Request $request, $id)
    {
        $cart = Cart::find($id);

        for ($i = '0'; $i < '3'; $i++) {

            if ($cart->quantity != $request->quantity_new + '1') {

                $cart->quantity = $request->quantity_new + '1';
                $cart->price = $cart->first_price * ($cart->quantity);
                $cart->save();
            } else {
                $cart->quantity = $cart->quantity - '1';
                $cart->save();
            }
        }
        return redirect('show_cart');
    }



    public function dec_quantity(Request $request, $id)
    {
        $cart = Cart::find($id);

        for ($i = '0'; $i < '3'; $i++) {

            if ($cart->quantity != $request->quantity_new + '1') {

                $cart->quantity = $request->quantity_new - '1';
                $cart->price = $cart->first_price * ($cart->quantity);
                $cart->save();
            } else {
                $cart->quantity = $cart->quantity - '1';
                $cart->save();
            }
        }
        return redirect()->back();
    }


    public function product_search(Request $request)
    {
        if (Auth::id()) {

            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            $search_text = $request->search;

            $product = Product::where('title', 'LIKE', "%$search_text%")
                ->orWhere('price', 'LIKE', "%$search_text%")
                ->orWhere('brand', 'LIKE', "%$search_text%")
                ->orWhere('catagory', 'LIKE', "%$search_text%")
                ->orWhere('brand', 'LIKE', "%$search_text%")
                ->orWhere('description', 'LIKE', "%$search_text%")
                ->orWhere('discount_price', 'LIKE', "%$search_text%")
                ->paginate(16);

            return view('home.show', compact('product', 'total_cart'));
        } else {

            $search_text = $request->search;

            $product = Product::where('title', 'LIKE', "%$search_text%")
                ->orWhere('price', 'LIKE', "%$search_text%")
                ->orWhere('brand', 'LIKE', "%$search_text%")
                ->orWhere('catagory', 'LIKE', "%$search_text%")
                ->orWhere('brand', 'LIKE', "%$search_text%")
                ->orWhere('description', 'LIKE', "%$search_text%")
                ->orWhere('discount_price', 'LIKE', "%$search_text%")
                ->paginate(16);

            return view('home.show', compact('product'));
        }
    }

    public function update_msg(Request $request)
    {
        if (Auth::id()) {


            if ($request->email) {


                $data = new msg;

                $data->name = $request->name;
                $data->email = $request->email;
                $data->subject = $request->subject;
                $data->message = $request->message;
                $data->save();

                Alert::success('Thanks For Liveng A MSg', 'Contacnt With You Very Reqards PakExpress');

                return redirect()->back();
            } else {
                Alert::warning('Complete The Form', 'You have miss some thing please complete then
                submit');

                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function otpsend($id)
    {
        if (Auth::id()) {
            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();
            $phone = Auth::user()->phone;
            $userid = Auth::user()->id;
            return view('home.sms', compact('phone', 'userid', 'total_cart'));
        } else {
            $phone = Auth::user()->phone;
            $userid = Auth::user()->id;
            return view('home.sms', compact('phone', 'userid'));
        }
    }


    public function otpsend_order(Request $request, $id, $totalprice)
    {
        if (Auth::id() && $request->totalprice) {
            $idc = Auth::user()->id;
            $total_cart = Cart::where('user_id', '=', $idc)->get()->count();
            $phone = Auth::user()->phone;
            $userid = Auth::user()->id;
            return view('home.smsorder', compact('phone', 'userid', 'total_cart', 'totalprice'));
        } else if (Auth::id() && !$request->totalprice) {

            Alert::warning('Not avilible Cart.', 'Thanks You');

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }


    public function Verify_num_save(Request $request, $id)
    {

        if (Auth::id()) {

            $user = User::where('id', $id)->first();

            $user->phone = $request->phone;


            $user->save();
            // $idc = Auth::user()->id;
            // $total_cart = Cart::where('user_id', '=', $idc)->get()->count();

            // $username = Auth::user()->name;
            // $userphone = Auth::user()->phone;
            // $usercity = Auth::user()->city;
            // $useraddress = Auth::user()->address;
            // $id = Auth::user()->id;

            // $cart = Cart::where('user_id', '=', $id)->get();

            // return view('home.show_cart', compact(
            //     'cart',
            //     'username',
            //     'userphone',
            //     'usercity',
            //     'useraddress',
            //     'id',
            //     'total_cart'
            // ))
            //     ->with('message', 'Address is Updated');
            Alert::success('Your Number is Saved', 'Thank You');

            return redirect('show_cart');
        } else {
            return redirect('login');
        }
    }




    public function Verify_num_save_order(Request $request, $id)
    {

        if ($request->phone) {

            $user = User::where('id', $id)->first();
            $user->phone = $request->phone;
            $user->save();
            Alert::success('Plase First You Verify number', 'Thank You');

            return redirect()->back();
        } else {

            Alert::warning('Plase First You Verify number', 'Thank You');

            return redirect()->back();
        }
    }


    public function email_newsletter(Request $request)
    {
        $data = new Newsletters();

        $data->email = $request->email;

        $data->save();

        Alert::success('You Have Succesfully Sucribe To Our NewsLeatter.', 'Thanks You');

        return redirect()->back();
    }
}

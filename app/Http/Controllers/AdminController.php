<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Newsletters;
use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\msg;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductFeatured;
use Illuminate\Support\Facades\Auth;

use PDF;

class AdminController extends Controller
{
    public function view_catagory ()
    {
        if(Auth::id())
        {
        $data = catagory::all();
        return view('admin.catagory', compact('data'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function add_catagory (Request $request)
    {



        if($request->catagory)
        {
        $data=new Catagory;



        $data->catagory_name = $request->catagory;

        $data->save();

        return redirect()->back()->with('message','Catagory Added Successfully');
        }
        else {
        return redirect()->back()->with('message','Enter The Catagory');

        }
    }


    public function delete_catagory($id)
    {
        $data=Catagory::find($id);
        $data->delete();

        return redirect()->back()->with('message','Catagory Delete Successfully');
    }

    public function view_product()
    {
        $catagory=Catagory::all();
        return view('admin.product', compact('catagory'));
    }
    public function add_product (Request $request)
    {

        $product = new Product;


        $product->title=$request->title;


        $product->brand=$request->brand;


        $product->description=$request->description;


        $product->catagory=$request->catagory;

        $product->quantity=$request->quantity;

        $product->price=$request->price;

        $product->discount_price=$request->dis_price;





            if ($request->image1)
            {

                $image1 = $request->image1;

                $imagename1 = time().'.'.$image1->getClientOriginalExtension();

                $request->image1->move('product', $imagename1);

                $product->image1=$imagename1;
            }


            if ($request->image2)
            {



                $image2 = $request->image2;

                $imagename2 = time().'.'.$image2->getClientOriginalExtension();

                $request->image2->move('product', $imagename2);

                $product->image2=$imagename2;

            }


            if ($request->image3)
            {

                $image3 = $request->image3;

                $imagename3 = time().'.'.$image3->getClientOriginalExtension();

                $request->image3->move('product', $imagename3);

                $product->image3=$imagename3;


            }

            if ($request->image4)
            {

                $image4 = $request->image4;

                $imagename4= time().'.'.$image4->getClientOriginalExtension();

                $request->image4->move('product', $imagename4);

                $product->image4=$imagename4;
            }



            if ($request->image5)
            {

                $image5 = $request->image5;

                $imagename5 = time().'.'.$image5->getClientOriginalExtension();

                $request->image5->move('product', $imagename5);

                $product->image5=$imagename5;

            }



        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');



    }


    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }



    public function delete_productss ($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product is Deleted Successfully');
    }

    public function update_product ($id)
    {
        $product = product::find($id);

        $catagory = Catagory::all();

        return view('admin.update_product', compact('product', 'catagory'));
    }




    public function update_product_confirm (Request $request,$id)
    {
        $product=Product::find($id);



        $product->title=$request->title;

        $product->brand=$request->brand;

        $product->description=$request->description;


        $product->catagory=$request->catagory;

        $product->quantity=$request->quantity;

        $product->price=$request->price;

        $product->discount_price=$request->dis_price;






        if ($request->image1)
        {

            $image1 = $request->image1;

            $imagename1 = time().'.'.$image1->getClientOriginalExtension();

            $request->image1->move('product', $imagename1);

            $product->image1=$imagename1;
        }


        if ($request->image2)
        {



            $image2 = $request->image2;

            $imagename2 = time().'.'.$image2->getClientOriginalExtension();

            $request->image2->move('product', $imagename2);

            $product->image2=$imagename2;

        }


        if ($request->image3)
        {

            $image3 = $request->image3;

            $imagename3 = time().'.'.$image3->getClientOriginalExtension();

            $request->image3->move('product', $imagename3);

            $product->image3=$imagename3;


        }

        if ($request->image4)
        {

            $image4 = $request->image4;

            $imagename4= time().'.'.$image4->getClientOriginalExtension();

            $request->image4->move('product', $imagename4);

            $product->image4=$imagename4;
        }



        if ($request->image5)
        {

            $image5 = $request->image5;

            $imagename5 = time().'.'.$image5->getClientOriginalExtension();

            $request->image5->move('product', $imagename5);

            $product->image5=$imagename5;

        }






        $product->save();

        return redirect()->back();

    }

    public function detials ($id)
    {

        $product = product::find($id);

        $catagory = Catagory::all();

        return view('admin.details', compact('product', 'catagory'));
    }





    public function featured_product()
    {
        $catagory=Catagory::all();
        return view('admin.featuredproduct', compact('catagory'));
    }


    public function add_featured_product (Request $request)
    {

        $productfeatured = new ProductFeatured();



            $productfeatured->title=$request->title;



        $productfeatured->brand=$request->brand;


        $productfeatured->description=$request->description;


        $productfeatured->catagory=$request->catagory;

        $productfeatured->quantity=$request->quantity;

        $productfeatured->price=$request->price;

        $productfeatured->discount_price=$request->dis_price;





            if ($request->image1)
            {

                $image1 = $request->image1;

                $imagename1 = time().'.'.$image1->getClientOriginalExtension();

                $request->image1->move('product', $imagename1);

                $productfeatured->image1=$imagename1;
            }


            if ($request->image2)
            {



                $image2 = $request->image2;

                $imagename2 = time().'.'.$image2->getClientOriginalExtension();

                $request->image2->move('product', $imagename2);

                $productfeatured->image2=$imagename2;

            }


            if ($request->image3)
            {

                $image3 = $request->image3;

                $imagename3 = time().'.'.$image3->getClientOriginalExtension();

                $request->image3->move('product', $imagename3);

                $productfeatured->image3=$imagename3;


            }

            if ($request->image4)
            {

                $image4 = $request->image4;

                $imagename4= time().'.'.$image4->getClientOriginalExtension();

                $request->image4->move('product', $imagename4);

                $productfeatured->image4=$imagename4;
            }



            if ($request->image5)
            {

                $image5 = $request->image5;

                $imagename5 = time().'.'.$image5->getClientOriginalExtension();

                $request->image5->move('product', $imagename5);

                $productfeatured->image5=$imagename5;

            }



        $productfeatured->save();

        return redirect()->back()->with('message', 'Product Added Successfully');



    }


    public function show_featured_product()
    {
        $productfeatured = ProductFeatured::all();
        return view('admin.show_featured_product',compact('productfeatured'));
    }


    public function featured_detials ($id)
    {

        $product = ProductFeatured::find($id);

        $catagory = Catagory::all();

        return view('admin.featured_detials', compact('product', 'catagory'));
    }


    public function featured_delete_product ($id)
    {
        $product = ProductFeatured::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product is Deleted Successfully');
    }


    public function featured_update_product ($id)
    {
        $product = ProductFeatured::find($id);

        $catagory = Catagory::all();

        return view('admin.featured_update_product', compact('product', 'catagory'));
    }


    public function update_featured_product_confirm (Request $request,$id)
    {
        $product=ProductFeatured::find($id);


        $product->title=$request->title;

        $product->brand=$request->brand;

        $product->description=$request->description;


        $product->catagory=$request->catagory;

        $product->quantity=$request->quantity;

        $product->price=$request->price;

        $product->discount_price=$request->dis_price;






        if ($request->image1)
        {

            $image1 = $request->image1;

            $imagename1 = time().'.'.$image1->getClientOriginalExtension();

            $request->image1->move('product', $imagename1);

            $product->image1=$imagename1;
        }


        if ($request->image2)
        {



            $image2 = $request->image2;

            $imagename2 = time().'.'.$image2->getClientOriginalExtension();

            $request->image2->move('product', $imagename2);

            $product->image2=$imagename2;

        }


        if ($request->image3)
        {

            $image3 = $request->image3;

            $imagename3 = time().'.'.$image3->getClientOriginalExtension();

            $request->image3->move('product', $imagename3);

            $product->image3=$imagename3;


        }

        if ($request->image4)
        {

            $image4 = $request->image4;

            $imagename4= time().'.'.$image4->getClientOriginalExtension();

            $request->image4->move('product', $imagename4);

            $product->image4=$imagename4;
        }



        if ($request->image5)
        {

            $image5 = $request->image5;

            $imagename5 = time().'.'.$image5->getClientOriginalExtension();

            $request->image5->move('product', $imagename5);

            $product->image5=$imagename5;

        }






        $product->save();

        return redirect()->back();

    }

    public function orders()
    {
        $product = Order::all();
        return view('admin.orders', compact('product'));
    }

    public function delete_order($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function delivered ($id)
    {

        $product = Order::find($id);

        $product->delivery_status = "deliverd";

        $product->save();

        return redirect()->back()->with('message', 'Order Delivered Successfully');
    }

    public function print_pdf ($id)
    {

        $order = Order::find($id);

        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->download('order_details.pdf');
    }
    public function search(Request $request)
    {
        $requestText = $request->search;

        $product=Order::where('name', 'LIKE', "%$requestText%")
        ->orWhere('phone', 'LIKE', "%$requestText%")
        ->orWhere('email', 'LIKE', "%$requestText%")
        ->orWhere('product_title', 'LIKE', "%$requestText%")->get();
        return view('admin.orders', compact('product'));
    }


    public function blog_upload()

    {
        return view('admin.blog_upload');
    }

    public function add_blog_update(Request $request)
    {
        $blog = new Blog;

        $blog->blog_title = $request->blog_title;

        $blog->blog_number = $request->blog_number;

        $blog->blog_description = $request->blog_description;

        $blog->blog_view_btn = $request->blog_view_btn;




        $blog->blog_image= $request->blog_image;

        $blog->save();

        return redirect()->back();

    }

    public function show_blog()
    {

        $blog = Blog::all();
        return view('admin.show_blog', compact('blog'));
    }

    public function blog_delete($id)
    {
        $data = Blog::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function contect_messages()
    {
        $message = msg::all();
        return view('admin.contact_messages', compact('message'));
    }

    public function message_delete ($id)
    {
        $message = msg::find($id);
        $message->delete();
        return redirect()->back();
    }

    public function show_newslatter()
    {
        $data = Newsletters::all();
        return view('admin.shownewsleater', compact('data'));
    }

    public function newslatter_delete($id)
    {
        $data = Newsletters::find($id);
        $data->delete();
        return redirect()->back();
    }
}





<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Contact;
use App\Models\Prescription;
use App\Models\Payments;
use App\Models\Drug;
use App\Models\Cart;
use App\Models\Order;


class AdminController extends Controller
{
    //
    public function index()
        {
            $num_of_patients = Patient::count();
            $num_of_doctors = Doctor::count();
            $num_of_products = Drug::count();
            $num_of_chats = Chat::count();
            return view('Admin.home', compact('num_of_patients','num_of_doctors','num_of_products','num_of_chats'));
        }

    public function search(Request $request)
        {
            $search = $request->search;
            $patients = Patient::where('first_name','Like','%'.$search.'%')->orWhere('last_name', 'Like','%'.$search.'%')->orWhere('national_id', 'Like','%'.$search.'%')->get();
            $doctors = Doctor::where('first_name','Like','%'.$search.'%')->orWhere('last_name', 'Like','%'.$search.'%')->orWhere('national_id', 'Like','%'.$search.'%')->get();
            $products = Drug::where('name','Like','%'.$search.'%')->get();

            return view('Admin.search_results',compact('search','patients','doctors','products'));
        }

    public function patients()
        {
            $patients = Patient::all();
            $user = User::all();
            return view('Admin.patients',compact('patients','user'));
        }

    public function patient($id)
        {
            $patient = Patient::find($id);
            $email = User::where('national_id',$patient->national_id)->value('email');
            return view('Admin.patient',compact('patient','email'));
        }

    public function messages()
        {
            $messages = Contact::all();
            return view('Admin.messages',compact('messages'));
        }

    public function message($id)
        {
            $message = Contact::find($id);
            $check1 = Patient::where('email',$message->email)->count();
            $check2 = Patient::where('phone',$message->phone)->count();

            $auth = null;
            $patient = null;

            if($check1 > 0)
                {
                    $auth = true;
                    $patient = Patient::all();
                }

            if($check2 > 0)
                {
                    $auth = true;
                    $patient = Patient::all();
                }


            return view('Admin.message',compact('message','auth','patient'));
        }

    public function doctors()
        {
            $doctors = Doctor::all();
            return view('Admin.doctors',compact('doctors'));
        }

    public function doctor($id)
        {
            $doctor = Doctor::find($id);
            $email = User::where('national_id',$doctor->national_id)->value('email');
            return view('Admin.doctor',compact('doctor','email'));
        }

    public function new_doctor()
        {
            return view('Admin.new_doctor');
        }

    public function post_doctor(Request $request)
        {
            $data = new Doctor;

            $image=$request->image;
            $imagename='doc-'.$request->fname.'-'.$request->lname.'-'.time().'.'.$image->getClientoriginalExtension();
            $image->move('Doctors',$imagename);
            $data->photo = $imagename;
            $data->first_name = $request->fname;
            $data->last_name = $request->lname;
            $data->national_id = $request->national_id;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->specialization = $request->specialization;
            $data->save();

            $data = new User;
            $data->name = $request->fname.' '.$request->lname;
            $data->user_type = "Doctor";
            $data->national_id = $request->national_id;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();

            return redirect()->back()->with('message','you have successfully added a new doctor');
        }

    public function update_doctor(Request $request, $id)
        {
            $data = Doctor::find($id);

            $image=$request->image;

            if($image)
                {
                    $imagename='doc-'.$request->fname.'-'.$request->lname.'-'.time().'.'.$image->getClientoriginalExtension();
                    $image->move('Doctors',$imagename);
                    $data->photo = $imagename;
                }

            $data->first_name = $request->fname;
            $data->last_name = $request->lname;
            $data->national_id = $request->national_id;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->specialization = $request->specialization;
            $data->save();

            $data = User::find($id);
            $data->name = $request->fname.' '.$request->lname;
            $data->national_id = $request->national_id;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();

            return redirect()->back()->with('message','you have successfully updated doctor details');
        }

    public function products()
        {
            $products=Drug::all();
            return view ('admin.products',compact('products'));
        }

    public function product($id)
        {
            $product=Drug::find($id);
            return view ('admin.product',compact('product'));
        }

    public function new_product()
        {
            return view ('admin.new_product');
        }

    public function post_product(Request $request)
        {
            $data = new Drug;

            $image=$request->image;

            $imagename=time().'.'.$image->getClientoriginalExtension();

            $image->move('Drugs',$imagename);

            $data->name = $request->name;
            $data->image = $imagename;
            $data->type = $request->type;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->stock = $request->stock;

            $data->save();

            return redirect('/admin/products');
        }

    public function update_product(Request $request, $id)
        {
            $data = Drug::find($id);

            $image=$request->image;

            if($image)
                {
                    $imagename=time().'.'.$image->getClientoriginalExtension();
                    $image->move('Drugs',$imagename);
                    $data->image = $imagename;
                }

            $data->name = $request->name;
            $data->type = $request->type;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->stock = $request->stock;

            $data->save();

            return redirect('/admin/products');

        }

    public function EditProduct(Request $request, $id)
        {
            $data = Drug::find($id);

            $data->name = $request->name;
            $data->type = $request->category;
            $data->category = $request->category;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity = $request->quantity;

            $image=$request->file;

            if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('productimage',$imagename);
                $data->image=$imagename;
            }

            $data->save();

            return redirect()->back()->with('message','Product Details updated Successfully');

        }

    public function DeleteProduct($id)
        {
            $data = Drug::find($id);
            $data->delete();

            return redirect()->back()->with('message','Product Deleted Successfully');
        }

    public function orders()
        {
            $orders = Order::all();
            $patient = Patient::all();
            $product = Drug::all();
            return view('admin.orders',compact('orders','patient','product'));
        }

    public function order($id)
        {
            $order = Order::find($id);
            $recentOrders = Order::where('patient_id',$order->patient_id)->orderBy('created_at','DESC')->get();
            $patient = Patient::all();
            $product = Drug::all();
            return view('admin.orders',compact('order','recentOrders','patient','cart','product'));
        }
}

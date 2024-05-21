<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //

	public function index()
		{

            $check = User::count();
            if($check === 0)
                {
                    $data = new User;
                    $data->id = "1";
                    $data->name = "Esnart Mlongwe";
                    $data->user_type = "Admin";
                    $data->national_id = "MW123";
                    $data->email = "mlongweesnart@gmail.com";
                    $data->email_verified_at = null;
                    //$table->rememberToken();
                    $data->password = "$2y$10$3U.1Vm2x9B.14jZwDtKbFeq.qzKoeXtT5/G8zQfBcvdafhc9rLZCO";
                    $data->current_team_id = null;
                    $data->profile_photo_path = null;
                    $data->created_at = "2023-04-07 08:41:56";
                    $data->updated_at = "2023-04-07 08:41:56";

                    $data->save();
                }

            if(Auth::id())
                {
                    return redirect('patient/home');
                }
            else
                {
                    $doctorcount = Doctor::count();
                    $doctors = Doctor::latest()->take(4)->get();


                    return view ('User.home',compact('doctors','doctorcount'));
                }
		}

    public function about()
		{
            if(Auth::id())
                {
                    return redirect('patient/about');
                }
            else
                {
                    $doctorcount = Doctor::count();
                    $doctors = Doctor::latest()->take(4)->get();
                    return view ('User.about',compact('doctors','doctorcount'));
                }
        }

    public function services()
		{
            if(Auth::id())
                {
                    return redirect('patient/services');
                }
            else
                {
                    return view ('User.services');
                }
        }

    public function service()
		{
            if(Auth::id())
                {
                    return redirect('patient/service/1');
                }
            else
                {
                    return view ('User.service-info');
                }
        }

    public function shop()
		{
            if(Auth::id())
                {
                    return redirect('patient/shop');
                }
            else
                {
                    $drugs = Drug::all();
                    $drugcount = Drug::count();
                    return view ('User.shop',compact('drugs','drugcount'));
                }
        }

    public function contact()
		{
            if(Auth::id())
                {
                    return redirect('patient/contact_us');
                }
            else
                {
                    return view ('User.contact');
                }
        }

    public function post_message(Request $request)
        {
            $data = new Contact;
            if(Auth::id())
                {
                    $nat_id = Auth::user()->national_id;
                    $patient = Patient::all();
                    $data->first_name = $patient->where('national_id',$nat_id)->value('first_name');
                    $data->last_name = $patient->where('national_id',$nat_id)->value('last_name');
                    $data->phone = $patient->where('national_id',$nat_id)->value('phone');
                    $data->email = $patient->where('national_id',$nat_id)->value('email');
                }
            else
                {
                    $data->first_name = $request->fname;
                    $data->last_name = $request->lname;
                    $data->phone = $request->phone;
                    $data->email = $request->email;
                }

            $data->message = $request->message;
            $data->save();

            return redirect()->back()->with('message','Thank oyu for contacting us we will reply soon');
        }

    public function doctors()
        {
            if(Auth::id())
                {
                    return redirect('patient/doctors');
                }
            else
                {
                    $doctorcount = Doctor::count();
                    $doctors = Doctor::all();
                    return view ('User.doctors',compact('doctors','doctorcount'));
                }
        }


	public function auth()
        {
            if(Auth::check() and Auth::user()->user_type == "Admin")
                {
                    return redirect('admin/dashboard');
                }

            elseif(Auth::check() and Auth::user()->user_type == "Doctor")
                {
                    return redirect('doctor/dashboard');
                }

			elseif(Auth::check() and Auth::user()->user_type == "Patient")
                {
                    return redirect('patient/home');
                }

            else
                {
                    return redirect('/login');
                }
        }

    public function newsletter(Request $request)
        {
            if(Auth::check())
                {
                    $data = new Newsletter;
                    $data->user_id = Auth::user()->id;
                    $data->email = $request->email;
                    $data->save();
                }
            else
                {
                    $data = new Newsletter;
                    $data->user_id = "guest";
                    $data->email = $request->email;
                    $data->save();
                }
        }

    public function coming_soon()
		{
            return view ('User.coming_soon');
        }

}

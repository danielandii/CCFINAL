<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\everlastMail;
use App\Plan;
use Illuminate\Http\Request;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function RegisterForm()
    {
        $plans = Plan::all();
        return view('register',[
            'plans' => $plans
        ]);
    }

    public function orderTransaction(Request $request)
    {
        $price = Plan::where('id','=',$request->plan_id)->pluck('price');
        $plan_name = Plan::where('id','=',$request->plan_id)->pluck('name');

        $date = Carbon::parse($request->date)->format('Y-m-d');
        $time = Carbon::parse($request->time)->format('H:i:s');
        $event_date = date('Y-m-d H:i:s', strtotime("$date $time"));

        $this->validate($request,[
            'name'          => 'required',
            'email'         => 'required|string|email|unique:customers',
            'male_name'     => 'required|string',
            'female_name'   => 'required|string',
            'address1'      => 'required|string',
            'date'          => 'required',
            'time'          => 'required',
            'plan_id'       => 'required',
            // 'address2'      => 'required|string',
            'family1'       => 'required|string',
            'family2'       => 'required|string',
            'lat'      =>'required',
            'long'      =>'required',
        ]);

        $data_customer = Customer::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'male_name'     => $request->male_name,
            'female_name'   => $request->female_name,
            'event_date'    => $event_date,
            'plan_name'     => $plan_name[0],
            'address1'      => $request->address1,
            // 'address2'      => $request->address2,
            'family1'       => $request->family1,
            'family2'       => $request->family2,
            'latitude'      => $request->lat,
            'longitude'     => $request->long
        ]);

        // generate qrCode
        $map_url = "https://www.google.com/maps/search/?api=1&query=".$request->latitude.",".$request->longitude."";


        Transaction::create([
            'customer_id'  => $data_customer->id,
            'plan_id'   => $request->plan_id,
            'price'     => $price[0],
            'code'      => $this->getNewCode(),
        ]);

        // $this->sendMail($request);

        return redirect()->route('home')->with('success', 'Berhasil order, Silahkan cek email untuk rincian order');
    }

    public function showViewCode()
    {
        return view('customer.code');
    }

    public function showOrderStatus(Request $request)
    {
        $statusOrder = Transaction::where('code', '=', $request->code)->select('status')->first();

        if($statusOrder->status == 'Sudah')
        {
            $statusNewString = 'Sudah Terverifikasi';
        }elseif($statusOrder->status == 'Baru')
        {
            $statusNewString = 'Belum Terverifikasi';
        }

        return view('orderstatus',[
            'statusNewString' => $statusNewString
        ]);
    }

    public function getNewCode()
    {
        $getLastId = Transaction::latest()->first();
        $getAuto = $getLastId->id +1;
        $staticString = 'EVEID';
        $getDateString = Carbon::now()->format('dmY');
        $getCode = $staticString.$getDateString.$getAuto;
        return $getCode;
    }

    public function sendMail(Request $request)
    {
        $data = [
            'email' => 'adifka09@gmail.com',
            'plan_id' => 1,
            'price' => 1212121,
            'code' => 12121
            // 'email' => $request->email,
            // 'plan_id' => $request->plan_id,
            // 'price' => $request->price,
            // 'code' => $request->code,
        ];
        // env config email
        // MAIL_USERNAME=44039328ba3b6d
        // MAIL_PASSWORD=980644be0f56c0

        Mail::send('emailku', $data, function($message) use ($data)
        {
            $message->from('admin@wedding.test', 'no-reply');
            $message->to($data['email'])->subject('Everlasting');
        });
        // to($data['email'])->send(new everlastMail($data));
        return "email telah terkirim";



    }
}

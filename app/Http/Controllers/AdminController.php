<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Plan;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    // Home
    public function home()
    {
        $pending = Transaction::where('status','=','Baru')->count();
        $success = Transaction::where('status','!=','Baru')->count();
        $plan = Plan::all()->count();
        $events = Customer::all();
        return view('admin.home',[
            'events' => $events,
            'pending' => $pending,
            'success' => $success,
            'plan' => $plan
        ]);
    }

    // Verif and show transaction
    public function indexTransaction(Request $request)
    {
        $transactions = Transaction::with('plan','customer')->select('transactions.*')->get();
        if($request->ajax()){
            return DataTables::of($transactions)
                        ->addIndexColumn()
                        ->addColumn('opsi', function($row)
                        {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Change" data-name="'.$row->status.'" class="btn btn-success status-transaction">Change Status</a>&nbsp';
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Select" class="btn btn-info select-transaction">Select</a>';
                            return $btn;
                        })
                        ->addColumn('status', function($row)
                        {   if($row->status == 'Baru')
                            $label = '<span class="label label-warning">Belum Terverifikasi</span>';
                            if($row->status == 'Sudah')
                            $label = '<span class="label label-success">Sudah Terverifikasi</span>';
                            return $label;
                        })
                        ->rawColumns(['opsi','status'])
                        ->make(true);
        }
        return view('admin.transaction.index',[
            'transactions' => $transactions
        ]);
    }

    public function verifyTransaction(Request $request, $id)
    {
        Transaction::find($id)->update([
            'status' => $request->status,
        ]);
        return response()->json(['success' => 'Transaction berhasil diupdate']);
    }

    public function showTransaction(Transaction $transaction)
    {
        $customer = Customer::find($transaction);
        $plan = Plan::find($transaction);
        return response()->json([$transaction,$customer,$plan]);
    }


    // CRUD Customer
    public function indexCustomer(Request $request)
    {
        // $customers = Customer::with('transaction')->select('customers.*')->get();
        $customers = Customer::all();
        $plans  = Plan::all();
        if($request->ajax()){
            return DataTables::of($customers)
                        ->addIndexColumn()
                        ->addColumn('opsi', function($row)
                        {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary edit-customer">Edit</a>&nbsp';
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" data-name="'.$row->email.'" class="btn btn-danger delete-customer">Hapus</a>';
                            return $btn;
                        })
                        ->rawColumns(['opsi'])
                        ->make(true);
        }

        return view('admin.customer.index',[
            'customers' => $customers,
            'plans' => $plans
        ]);
    }

    public function addCustomer(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email'         => 'required|string|email|unique:customers',
            'password'      => 'required|string|min:6|confirmed',
            'male_name'     => 'required|string',
            'female.name'   => 'required|string',
            'event.date'    => 'required|string',
            'plan_name' => 'required',
            'address1'      => 'required|string',
            'address2'      => 'required|string',
            'family1'       => 'required|string',
            'family2'       => 'required|string'
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(['error' => $error]);
        }

        Customer::create([
            'email'         => $request->email,
            'password' => Hash::make($request['password']),
            'male_name'     => $request->male_name,
            'female_name'   => $request->female_name,
            'event_date'    => $request->event_date,
            'plan_name'     => $request->plan_name,
            'address1'      => $request->address1,
            'address2'      => $request->address2,
            'family1'       => $request->family1,
            'family2'       => $request->family2,
        ]);
        return response()->json(['success' => 'Customer berhasil ditambahkan']);
    }

    public function editCustomer(Customer $customer)
    {
        $plans = Plan::all();
        return response()->json([$customer,$plans]);
    }

    public function updateCustomer(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:customers,email,'.$id,
            'male_name'     => 'required|string',
            'female.name'   => 'required|string',
            'event.date'    => 'required|string',
            'plan_name'     => 'required',
            'address1'      => 'required|string',
            'address2'      => 'required|string',
            'family1'       => 'required|string',
            'family2'       => 'required|string'

        ]);
        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(['error' => $error]);
        }

        Customer::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'male_name'     => $request->male_name,
            'female_name'   => $request->female_name,
            'event_date'    => $request->event_date,
            'plan_name'     => $request->plan_name,
            'address1'      => $request->address1,
            'address2'      => $request->address2,
            'family1'       => $request->family1,
            'family2'       => $request->family2,
        ]);
        return response()->json(['success' => 'Customer berhasil diperbarui']);
    }

    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'success' => 'Customer berhasil dihapus'
        ]);
    }


    // CRUD Plan
    public function indexPlan(Request $request)
    {
        $plans = Plan::all();

        if($request->ajax()){
            return DataTables::of($plans)
                        ->addIndexColumn()
                        ->addColumn('opsi', function($row)
                        {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary edit-plan">Edit</a>&nbsp';
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" data-name="'.$row->name.'" class="btn btn-danger delete-plan">Hapus</a>';
                            return $btn;
                        })
                        ->rawColumns(['opsi'])
                        ->make(true);
        }

        return view('admin.plan.index',[
            'plans' => $plans
        ]);
    }

    public function addPlan(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'          => 'required|regex:/^[\pL\s]+$/u',
            'description'   => 'required|string',
            'price' => 'required|numeric'

        ]);
        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(['error' => $error]);
        }

        Plan::UpdateOrcreate([
            'id' => $request->id
        ],
        [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return response()->json(['success' => 'Plan berhasil ditambahkan']);
    }

    public function editPlan(Plan $plan)
    {
        return response()->json($plan);
    }

    public function updatePlan(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name'          => 'required|regex:/^[\pL\s]+$/u',
            'description'   => 'required|string',
            'price' => 'required|numeric'

        ]);
        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(['error' => $error]);
        }

        Plan::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return response()->json(['success' => 'Plan berhasil diperbarui']);
    }

    public function deletePlan(Plan $plan)
    {
        $plan->delete();
        return response()->json([
            'success' => 'Plan berhasil dihapus'
        ]);
    }

}

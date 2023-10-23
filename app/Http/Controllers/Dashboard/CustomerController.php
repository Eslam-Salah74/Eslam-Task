<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\customer\storeCustomerRequest;
use App\Http\Requests\customer\updateCustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('Dashboard.Customer.index',compact('customers'));
    }

    public function store(storeCustomerRequest $request)
    {
        try {
            $validated = $request->validated();
            // return $request;
            $customer =  Customer::create([
                    'company'=>$request->company,
                    'contact_person'=>$request->contact_person,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'city'=>$request->city,
                    'state'=>$request->state,
                    'postal_code'=>$request->postal_code,
                    'country'=>$request->country,
            ]);
            if($customer)
            {
                session()->flash('success');
                return redirect()->back();
            }
            session()->flash('error');
            return redirect()->back();
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function update(updateCustomerRequest $request)
    {
        try {
            $validated = $request->validated();
            $customer  = Customer::findOrFail($request->id);
           
            if ($customer) {
                $customer->update([
                    'company'=>$request->company,
                    'contact_person'=>$request->contact_person,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'city'=>$request->city,
                    'state'=>$request->state,
                    'postal_code'=>$request->postal_code,
                    'country'=>$request->country,
                ]);
                session()->flash('success');
                return redirect()->back();
            }
            session()->flash('error');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        if ($customer) {    
            $customer->delete();
            session()->flash('success');
            return redirect()->back();
        }
        session()->flash('error');
        return redirect()->back();
    }
}

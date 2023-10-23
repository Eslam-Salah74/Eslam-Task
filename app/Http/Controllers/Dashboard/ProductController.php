<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Shipingrate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\product\storeProductRequest;
use App\Http\Requests\product\updateProductRequest;
use App\Http\Requests\category\storeCustomerRequest;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $shipingrates = Shipingrate::get(['id','country']);
        return view('Dashboard.Product.index',compact('products','shipingrates'));
    }

    public function store(storeProductRequest $request)
    {
        try {
            $validated = $request->validated();
    
            $products =  Product::create([
                'name'=>$request->name,
                'weight'=>$request->weight,
                'price'=>$request->price,
                'vat'=>$request->price * (14 / 100),
                'discount' =>$request->discount,
                'shipping_id' =>$request->shipping_id,
                'sale_price'=>$request->price + ($request->price * (14 / 100)),
                'shipping_rate' =>0,
            ]);
            $shipping = Shipingrate::find($products->shipping_id);
            $products->update([
                'shipping_rate' => $request->weight * $shipping->rate * 10,
            ]);
            if($products)
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

    
    public function update(updateProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $products  = Product::findOrFail($request->id);
           
            if ($products) {
                $products->update([
                    'name'=>$request->name,
                    'weight'=>$request->weight,
                    'price'=>$request->price,
                    'vat'=>$request->price * (14 / 100),
                    'discount' =>$request->discount,
                    'shipping_id' =>$request->shipping_id,
                    'sale_price'=>$request->price + ($request->price * (14 / 100)),
                    'shipping_rate' =>0,

                ]);
                $shipping = Shipingrate::find($products->shipping_id);
                $products->update([
                'shipping_rate' => $request->weight * $shipping->rate * 10,
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
        $products = Product::findOrFail($request->id);
        if ($products) {    
            $products->delete();
            session()->flash('success');
            return redirect()->back();
        }
        session()->flash('error');
        return redirect()->back();
    }

    public function details($id)
    {
        $details  = DB::table('products')->where('id', $id)->get();
        return response()->json($details);
    }
}

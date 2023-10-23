<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\sale\storeSaleRequest;



class SaleController extends Controller
{
    public function index()
    {
        // $salesitems = SaleItem::where('sale_id',null)->get();
        // foreach($salesitems as $salesitem)
        // {
        //     $salesitems->delete();
        // } 
        $sales = Sale::get();
        return view('Dashboard.Sale.index',compact('sales'));
    }

    public function create()
    {
        $sales_details = SaleItem::where('sale_id',null)->get();
        foreach($sales_details as $sale_detail)
        {
            $sale_detail->delete();
        }
        $products  = Product::get();
        return view('Dashboard.Sale.create')
        ->with([
            'products'  => $products,
        ]);
    }

    public function store(/*storeSaleRequest*/ Request $request)
    {
        // return $request;
        try {
            // $validated = $request->validated();
            $sales =  Sale::create([
                    'sub_total'=>$request->price,
                    'shipping'=>$request->shipping_rate,
                    'vat'=>$request->vat_total,
                    'discount'=>$request->discount,
                    'total'=>$request->grand_total,
            ]);
            $sales_details = SaleItem::where('sale_id',null)->get();
            foreach($sales_details as $sale_detail)
            {
                $sale_detail->update(['sale_id' => $sale->id]);
            }
            if (!$sale_detail) {
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            return response()->json([
                'status'   => true,
                'messages' => 'تم الحفظ بنجاح',
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        $sales = Sale::findOrFail($request->id);
        if ($sales) {    
            $sales->delete();
            session()->flash('success');
            return redirect()->back();
        }
        session()->flash('error');
        return redirect()->back();
    }

    public function getproduct($id)
    {
        $details  = DB::table('products')->where('id', $id)->select('price', 'id')->get();
        return response()->json($details);
    }

    /****/
    public function fetchDetails()
    {
        $grand_total = 0;
        $discount_total = 0;

        $vat_total = 0;

        $sale_details = [];

        $sales_details = SaleItem::where('sale_id',null)->get();

        foreach($sales_details as $sale_detail)
        {
            $grand_total += ($sale_detail->sale_price) + ($sale_detail->shipping_rate);
            $discount_total += $sale_detail->discount;
            $vat_total += $sale_detail->vat;
            
            $item['id']         = $sale_detail->id;
            $item['product']    = $sale_detail->product->name;
            $item['sale_price'] = $sale_detail->sale_price;
            $item['vat'] = $sale_detail->vat;
            $item['discount'] = $sale_detail->discount;
            $item['shipping_rate']  = $sale_detail->shipping_rate;
            $item['sub_total']  = $sale_detail->price;
            $sale_details[] = $item;
        }
        return response()->json([
            'sale_details'   => $sale_details,
            'grand_total'    => $grand_total,
            'discount_total' => $discount_total,
            'vat_total' => $vat_total,
        ]);
    }



    // public function fetchLastDetails()
    // {
    //     $grand_total = 0;
    //     $sale_details = [];
    //     $sales_details = SaleItem::where('sale_id',null)->OrderBy('id','Desc')->get();
    //     foreach($sales_details as $sale_detail)
    //     {
    //         $grand_total += ($sale_detail->unit_price) * ($sale_detail->quantity);

    //         $item['id']         = $sale_detail->id;
    //         $item['product']    = $sale_detail->product->name;
    //         $item['quantity']   = $sale_detail->quantity;
    //         $item['sale_price'] = $sale_detail->sale_price;
    //         $item['discount'] = $sale_detail->discount;
    //         $item['shipping_rate'] = $sale_detail->shipping_rate;
    //         $item['sub_total']  = ($sale_detail->sale_price) * ($sale_detail->quantity);
    //         $sale_details[] = $item;
    //     }
    //     return response()->json([
    //         'sale_details' => $sale_details[0],
    //         'grand_total'  => $grand_total,
    //     ]);
    // }



    public function storeDetails(Request $request)
    { 
        try {
            //insert data
            $sale_detail = SaleItem::create([
                'product_id'    => $request->product_id,
                'sale_id'       =>null,
                'sale_price'  => $request->sale_price,
                'discount'  => $request->discount,
                'shipping_rate'  => $request->shipping_rate,
                'vat'  => $request->vat,
                'sub_total'  => $request->price,
            ]);
            if (!$sale_detail) {
                return response()->json([
                    'status'   => false,
                    'messages' => 'لقد حدث خطأ ما برجاء المحاولة مجدداً',
                ]);
            }
            return response()->json([
                'status'   => true,
                'messages' => 'تم الحفظ بنجاح',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroyDetails($id)
    {
        $sale_detail = SaleItem::find($id);
        $sale_detail->delete();
        return response()->json([
            'status'   => true,
            'messages' => 'تم الحفظ بنجاح',
        ]);
    }
    /*****/
}

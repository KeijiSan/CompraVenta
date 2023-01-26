<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;

class PurchaseController extends Controller
{
   public function index()
    {
        $purchases = Purchase ::get();
        return view('admin.purchase.index',compact('purchases'));
    }


    public function create()
    {
        $providers = Provider ::get();
        return view('admin.purchase.create',compact('providers'));

    }


    public function Store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all());

        foreach($request->product_id as $key => $product){
            $results[] =array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key],"price"=>$request->price[$key]);
        }

        $purchase->purchaseDetails()->createMany($results);


        return redirect()->route('purchases.index');   
    }


    public function show(purchase $purchase)
    {
        return view('admin.purchase.show',compact('purchase'));
        
    }


    public function edit(purchase $purchase)
    {
        $Purchase = Purchase::create($request->all());
        return view('admin.purchase.show',compact('purchase'));

    }


    public function Update(UpdateRequest $request, purchase $purchase)
    {
        //$purchase::update($request->all());
        //return redirect()->route('purchases.index'); 
    }

    public function destroy(purchase $purchase)
    {
        //$purchase->delete();
        //return redirect()->route('purchases.index'); 

    }
}

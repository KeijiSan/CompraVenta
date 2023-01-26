<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;


class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale ::get();
        return view('admin.sale.index',compact('sales'));
    }


    public function create()
    {
        $clients = Client ::get();
        return view('admin.sale.create',compact('clients'));

    }


    public function Store(StoreRequest $request)
    {
        $sale = Sale::create($request->all());

        foreach($request->product_id as $key => $product){
            $results[] =array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key],"price"=>$request->price[$key],"discount"=>$request->discount[$key]);
        }

        $sale->saleDetails()->createMany($results);


        return redirect()->route('sales.index');   
    }


    public function show(sale $sale)
    {
        return view('admin.sale.show',compact('sale'));
        
    }


    public function edit(sale $sale)
    {
        $clients = Client ::get();
        return view('admin.sale.show',compact('sale'));

    }


    public function Update(UpdateRequest $request, sale $sale)
    {
        //$sale::update($request->all());
        //return redirect()->route('sales.index'); 
    }

    public function destroy(sale $sale)
    {
        //$sale->delete();
        //return redirect()->route('sales.index'); 

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;
use App\Product;
use App\Service;
use App\User;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use App\Http\Requests\ProductValidateRequest;
use App\Http\Requests\ServiceValidateRequest;
use App\Http\Controllers\Auth\AuthController;
use Auth;
use DB;




class ProductsController extends Controller
{
    public function index(Request $request)
    {

        //$products = Product::paginate(5);


//        $client= Client::Find($products['client_id']);
       // return view('products.index', compact('products'));




        $search = $request->input('searchpiesa');
        $result=Product::where('product_name', 'LIKE', '%'.$search.'%')->paginate(10);

        $products = Product::orderBy('product_name', 'asc')->get();
        if ($result==' "" ')
            return view('products.index', compact('products'));
        else
        {
            $products=$result;
            return view('products.index', compact('products'));

        }

    }

    public function create()
    {
       $clients= Client::select('id', DB::raw('CONCAT(firstname, " ", lastname) AS fullname'))->lists('fullname', 'id');


        return view('products.create', compact('clients'));

    }

    public function store(ProductValidateRequest $request)
    {
        Product::create($request->all());
        return redirect('products');

    }

    public function delete($id)
    {
        $product = Product::Find($id);
        $product->delete();
        return redirect('products');
    }

    public function service($id)
    {
        $user = Auth::user()->id;
        $product = Product::Find($id);
        return view('products.service', compact('product','user'));
    }

    public function save(ServiceValidateRequest $request)
    {
        Service::create($request->all());
        return redirect('products');
    }
    
    public function detail($id)
    {
        $product = Product::Find($id);

        $services = Service::where('product_id','=',$id)->get();
        return view('products.detail', compact('product', 'services'));
    }
}

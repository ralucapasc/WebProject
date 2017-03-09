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

    }
    public function store(Request $reguest)
    {
        $shop=new Laravel;
        $shop->name=Input::get("name");
        $shop->town=Input::get("town");
    }
   
}

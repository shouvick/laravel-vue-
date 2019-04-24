<?php

namespace App\Http\Controllers;

use App\Customer; 
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer');
    }

    public function save(Request $request)
    {
       $data = $request->except('_token');
       Customer::insert($data);
    }

    public function list()
    {
        $data = Customer::all();
        return $data;
    }
}

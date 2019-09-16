<?php

namespace App\Http\Controllers;
use Validator;
use App\User;
use App\Customer;
use App\Product;
use App\Invoice;
use App\Payment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $req){
    	$usr= User::find($req->session()->get('id'));
    	return view('User.index', ['usr'=>$usr]);
    }

    public function createCustomer(){
    	return view('User.createCustomer');
    }
    public function createdCustomer(Request  $req)
    {
    	$validation = Validator::make($req->all(), [
            'name'=>'required',
            'email'=> 'required|unique:customers|regex:/^.+@.+$/i',
            'address'=>'required',
		])->validate();
      
            $custo  = new Customer();
            $custo->name = $req->name;
            $custo->email = $req->email;
            $custo->address = $req->address;
            $custo->save();
        
            $req->session()->flash('msg', "A new Customer is created successfully!");
            
            return redirect()->route('User.index');
    }

    public function createProduct(){
    	return view('User.createProduct');
    }
    public function createdProduct(Request  $req)
    {
    	$validation = Validator::make($req->all(), [
            'name'=>'required',
            'category'=> 'required',
            'description'=>'required',
		])->validate();
      
            $pro  = new Product();
            $pro->name = $req->name;
            $pro->category = $req->category;
            $pro->description = $req->description;
            $pro->save();
        
            $req->session()->flash('msg', "A new Product is created successfully!");
            
            return redirect()->route('User.index');
    }

    public function createInvoice(){
    	$usr= Customer::all();
    	$pro= Product::all();
    	return view('User.createInvoice', ['usr'=>$usr, 'pro'=>$pro]);
    }
    public function createdInvoice(Request $req){
    	$validation = Validator::make($req->all(), [
            'customer'=>'required',
            'currency'=> 'required',
            'date'=>'required',
            'item'=>'required',
            'quantity'=>'required',
            'unitprice'=>'required',
            'discount'=>'required',
		])->validate();
      		
      		$cus= Customer::find($req->customer);
      		$pro= Product::find($req->item);
            $inv  = new Invoice();
            $inv->productid = $pro->id;
            $inv->customername = $cus->name;
            $inv->customeremail = $cus->email;
            $inv->date = $req->date;
             $tm=($req->unitprice*$req->quantity);
             $t=$tm-(($req->discount*$tm)/100);
            $inv->amount = $t;
            $inv->currency = $req->currency;
            $inv->discount = $req->discount;
            $inv->quantity = $req->quantity;
            $inv->unitprice = $req->unitprice;

            $inv->save();
        
            $req->session()->flash('msg', "A new Invoice is created successfully!");
            
            //return view($cus);
            return redirect()->route('User.index');
    }
    public function viewInvoice(){
    	$inv= Invoice::all();
    	return view('User.viewInvoice', ['inv'=>$inv]);
        //return view($inv[0]->id);
    }
    public function invoiceDetails($id){
    	$inv= Invoice::find($id);
    	return view('User.invoiceDetails', ['inv'=>$inv]);
    }
    public function pay(Request $req, $id){

        $inv= Invoice::find($id);
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_yWpeTEBaWD1MCNrrw5VKIYlI00lv9vVN5S');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $inv->amount,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        $pay  = new Payment();
        $pay->invoiceid = $inv->id;
        $pay->amount = $inv->amount;
        $pay->card = '4242';

        $pay->save();
    
        $req->session()->flash('msg', "Payment successful!!");

        return redirect()->route('view.invoice');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;

class CartController extends Controller
{
    //
    public function add_cart(Request $request,$id)
    {
    	$sanpham = Product::find($id);
    	$oldcart = (Session::has('cart'))?Session::get('cart'):null;
    	$cart = new Cart($oldcart);
    	$cart->add($sanpham,$id);
    	$request->session()->put('cart',$cart);
    	return redirect()->route("pages.index");
    }

    public function delete_cart(Request $request,$id)
    {
    	$oldcart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldcart);
    	$cart->removeItem($id);
    	if($cart->totalQty < 0)
    	{
    		Session::forget('cart');
    	}
    	else
    	{
    		$request->session()->put('cart',$cart);
    	}
    	return redirect()->route('pages.index');
    }

    public function getDatHang()
    {
    	return view("pages.dathang");
    }

    public function postDatHang(Request $request)
    {
    	$errors = [
    		"name" => "required",
    		"gender" => "required",
    		"email" => "required|email",
    		"address" => "required",
    		"phone" => "required",
    		"note" => 'required'
    	];

    	$messages = [
    		"name.required" => "Vui lòng nhập tên",
    		"name.gender" => "Vui lòng chọn giới tính",
    		"email.required" => "Vui lòng nhập email",
    		"email.email" => "Vui lòng chọn email",
    		"address.required" => "vui lòng nhập địa chỉ",
    		"phone.required" => "Vui lòng nhập số điện thoại",
    		"note.required" => "Vui lòng nhập ghi chú"   		
    	];
    	$this->validate($request,$errors,$messages);

    	$cart = Session::get('cart');

    	$customer = new Customer;
    	$customer->name = $request->name;
    	$customer->gender = $request->gender;
    	$customer->email = $request->email;
    	$customer->address = $request->address;
    	$customer->phone_number = $request->phone;
    	$customer->note = $request->note;
    	$customer->save();

    	$bill = new Bill;
    	$bill->id_customer = $customer->id;
    	$bill->date_order = date('Y-m-d');
    	$bill->total = $cart->totalPrice;
    	$bill->payment = $request->payment_method;
    	$bill->note = $request->note;
    	$bill->save();

    	foreach ($cart->items as $key => $value) {
    		$bill_detail = new BillDetail;
	    	$bill_detail->id_bill = $bill->id;
	    	$bill_detail->id_product = $key;
	    	$bill_detail->quantity = $value['qty'];
	    	$bill_detail->unit_price = $value['price']/$value['qty'];
	    	$bill_detail->save();
    	}
    	Session::forget('cart');

    	return redirect()->route('pages.dathang')->with("thongbao","Đặt hàng thành công");
    }
}

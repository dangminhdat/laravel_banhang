<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\User;
use Hash;
use Auth;

class PagesController extends Controller
{
    //
    function __construct()
    {
    	$slide = Slide::all();
    	$sanpham_new = Product::where("new",1)->simplePaginate(8);
    	$sanpham_sale = Product::where("promotion_price","<>",0)->simplePaginate(8);
    	// $loaisp = ProductType::all();
    	// view()->share("loaisp",$loaisp);
    	view()->share("slide",$slide);
    	view()->share("sanpham_new",$sanpham_new);
    	view()->share("sanpham_sale",$sanpham_sale);
    }

    public function index()
    {
    	return view("pages.trangchu");
    }

    public function gioithieu()
    {
    	return view("pages.gioithieu");
    }

    public function lienhe()
    {
    	return view("pages.lienhe");
    }

    public function dangnhap()
    {
        return view("pages.dangnhap");
    }

    public function dangky()
    {
        return view("pages.dangky");
    }

    public function postDangKy(Request $request)
    {
        $errors = [
            "email" => "required|email|unique:users,email",
            "name" => "required",
            "password" => "required|min:6|max:20",
            "re-password" => "required|same:password"
        ];
        $messages = [
            "email.required" => "Vui lòng nhập email",
            "email.email" => "Vui lòng nhập đúng định dạng email",
            "email.unique" => "Email đã tồn tại",
            "name.required" => "Vui lòng nhập tên",
            "password.required" => "Vui lòng nhập password",
            "password.min" => "Mật khẩu có ít nhất 6 ký tự",
            "password.max" => "Mật khẩu có nhiều nhất 20 ký tự",
            "re-password.required" => "Vui lòng nhập mật khẩu nhập lại",
            "re-password.same" => "Mật khẩu nhập lại không đúng"
        ];

        $this->validate($request,$errors,$messages);

        $user = new User;
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("pages.dangky")->with("thongbao","Đăng ký thành công");
    }

    public function postDangNhap(Request $request)
    {
        $errors = [
            "email" => "required|email",
            "password" => "required|min:6|max:20"
        ];
        $messages = [
            "email.required" => "Vui lòng nhập email",
            "email.email" => "Vui lòng nhập đúng định dạng email",
            "password.required" => "Vui lòng nhập password",
            "password.min" => "Mật khẩu có ít nhất 6 ký tự",
            "password.max" => "Mật khẩu có nhiều nhất 20 ký tự"
        ];

        $this->validate($request,$errors,$messages);

        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
        {
            return redirect()->route("pages.index");
        }
        else
        {
            return redirect()->route("pages.dangnhap")->with("loi","Sai email hoặc mật khẩu");
        }
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect()->route("pages.index");
    }

    public function timkiem(Request $request)
    {
        $sanpham = Product::where("name","like","%$request->timkiem%")->orwhere("unit_price","like","%$request->timkiem%")->orwhere("promotion_price","like","%$request->timkiem%")->get();
        return view("pages.timkiem",["sanpham"=>$sanpham]);
    }
}

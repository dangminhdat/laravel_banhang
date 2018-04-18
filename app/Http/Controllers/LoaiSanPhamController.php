<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class LoaiSanPhamController extends Controller
{
    //
	function __construct()
	{
		$all_loaisanpham = ProductType::all();
		view()->share("all_loaisanpham",$all_loaisanpham);
	}

    public function getLoaiSanPham($id)
    {
    	$loaisanpham = ProductType::find($id);
    	$sanpham = Product::where('id_type',$id)->simplePaginate(12);
    	$sanpham_khac = Product::inRandomOrder()->where('id_type','<>',$id)->take(3)->get();
    	return view("pages.loaisanpham",["loaisanpham"=>$loaisanpham,"sanpham"=>$sanpham,"sanpham_khac"=>$sanpham_khac]);
    }

}

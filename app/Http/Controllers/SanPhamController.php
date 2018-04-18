<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SanPhamController extends Controller
{
    //
    public function getSanPham($id)
    {
    	$sanpham = Product::find($id);
    	$sanpham_lienquan = Product::where('id_type',$sanpham->id_type)->where('id','<>',$id)->inRandomOrder()->take(6)->get();
    	return view("pages.chitiet",["sanpham"=>$sanpham,"sanpham_lienquan"=>$sanpham_lienquan]);
    }

}

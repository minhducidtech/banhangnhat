<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

class PageController extends Controller
{
    //
    function getIndex(){
        $slide = Slide::all();
        $newproduct=Product::where('new',1)->get();
        $newproduct_page=Product::where('new',1)->paginate(4);
        $saleproduct=Product::where('promotion_price','<>',0)->get();
        $saleproduct_page=Product::where('promotion_price','<>',0)->paginate(8);

        //return view('page.trangchu',['slide'=>$slide]);
        return view('page.trangchu',compact('slide','newproduct','newproduct_page','saleproduct','saleproduct_page'));
    }

    function getLoaisanpham($type){
        $sp_theoloai=Product::where('id_type',$type)->get();
        $sp_khac=Product::where('id_type','<>',$type)->paginate(3);
        $loai=ProductType::all();
        $loai_sp=ProductType::where('id',$type)->first();
        return view('page.loaisanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    function getChitietsanpham(Request $req){
        $sanpham=Product::where('id',$req->id)->first();
        $sanphamtt=Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitietsanpham',compact('sanpham','sanphamtt'));
    }

    function getLienhe(){
        return view('page.lienhe');
    }

    function getGioithieu(){
        return view('page.gioithieu');
    }

    public function getAddtoCart(Request $req,$id)
    {
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();

    }
}

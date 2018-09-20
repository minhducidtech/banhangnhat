<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;

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

    function getLoaisanpham(){
    	return view('page.loaisanpham');
    }

    function getChitietsanpham(){
    	return view('page.chitietsanpham');
    }

    function getLienhe(){
        return view('page.lienhe');
    }

    function getGioithieu(){
        return view('page.gioithieu');
    }
}

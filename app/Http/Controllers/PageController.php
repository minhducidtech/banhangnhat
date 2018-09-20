<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    function getIndex(){
    	return view('page.trangchu');
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

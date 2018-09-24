<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use Hash;
use Auth;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;

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

    public function getDellItemCart($id)
    {
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        
        return redirect()->back();

    }

    public function getCheckout()
    {
         $cart=Session::get('cart');
         // dd($cart);
         //Tao tt khach hang
        // $custom=new Customer;
        // $custom->name=$req->name;
        // $custom->gender=$req->gender;
        // $custom->email=$req->email;
        // $custom->address=$req->address;
        // $custom->phone=$req->phone;
        // $custom->note=$req->note;
        // //Tao tt bill
        // $bill=new Bill;
        // $bill->id_customer=$custom->id;
        // $bill->date_order=date('Y-m-d');
        // $bill->total=$cart->totalPrice;
        // $bill->payment=$req->payment;
        // $bill->note=$req->note;
        // //Tao tt bill detail
        // foreach ($cart['item'] as $key=>$value) {
        //     $bill_detail=new BillDetail;
        //     $bill_detail->id_bill=$bill->id;
        //     $bill_detail->id_product=$key;
        //     $bill_detail->quantity=$value['qty'];
        //     $bill_detail->unit_price=$value['price']/$value['qty'];
        //     $bill_detail->save();

        // }
        // $Session::forget('cart');
         return view('page.dathang',compact('cart'));
            

    }

    public function postCheckout(Request $req)
    {
        $cart=Session::get('cart');
        //dd($cart);
        //Tao tt khach hang
        $custom=new Customer;
        $custom->name=$req->name;
        $custom->gender=$req->gender;
        $custom->email=$req->email;
        $custom->address=$req->address;
        $custom->phone_number=$req->phone;
        $custom->note=$req->notes;
        $custom->save();
        //Tao tt bill
        $bill=new Bill;
        $bill->id_customer=$custom->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->notes;
        $bill->save();

        //Tao tt bill detail
        foreach ($cart->items as $key=>$value) {
            $bill_detail=new BillDetail;
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();

        }
        Session::forget('cart');
        return view('page.donhang',compact('bill','custom','cart'));
            

    }

    public function getLogin(){
        return view('page.login');
    }


     public function postLogin(Request $req){
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'

        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Độ dài Password từ 6 đến 20 kí tự',
            'password.max'=>'Độ dài Password từ 6 đến 20 kí tự',
        ]);

        $credentials=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
             return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
        return view('page.login');
    }

    public function getSignup(){
        return view('page.signup');
    }

    public function postSignup(Request $req){

        $this->validate($req,[
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            're_password'=>'required|same:password'

        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Độ dài password từ 6 đến 20 kí tự',
            'password.max'=>'Độ dài password từ 6 đến 20 kí tự',
            'fullname.required'=>'Vui lòng nhập tên người dùng',
            're_password.required'=>'Vui lòng nhập Re password',
            're_password.same'=>'Re password khác với Password '

        ]);
        $user = new User();
        $user->full_name=$req->fullname;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thongbao','Lập tài khoản thành công');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function getSearch(Request $req){
        $product=Product::where('name','like','%'.$req->key.'%')
                        ->orwhere('unit_price',$req->key)
                        ->get();
        return view('page.search',compact('product'));

    }

}

<?php

namespace App\Http\Controllers;
use App\Models\SupplierModel;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function getSupplier()
    {
        $supplier=SupplierModel::all();
        return view('admin.product.getSupplier',['supplier'=>$supplier]);
    } 
    function getSupplierbyProvince(Request $request)
    {
        $province = $request->input('selectProvince');
        $supplier = SupplierModel::where('province',$province)->get();
        return view('admin.product.getSupplierbyProvince', ['supplier' => $supplier]);
    }
    function forminsertSupplier(){//lay form de nhanp lieu
        return view('admin.product.insertSupplier');
    }
    function insertSupplier(Request $request){
        $supplier = new SupplierModel;
        $supplier ->id = $request ->id;
        $supplier ->name = $request ->name;
        $supplier ->tel = $request ->tel;
        $supplier ->band = $request ->selectProvince;
        $supplier ->taxcode = $request ->taxcode;
        
        $supplier->save();
        return redirect('admin/product/insertSupplier')
        ->with("Note","Thêm thành công!");
    }
   
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contacto;
use Brian2694\Toastr\Facades\Toastr;


class ContactoController extends Controller
{
    //

    public function index(){

        $contactos = Contacto::all();
        $contactoCount = Contacto::count();

        return view('admin.contacto.index',compact('contactos','contactoCount'));
    }

    public function destroy($id)
    {
        //
        Contacto::find($id)->delete();
        Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}

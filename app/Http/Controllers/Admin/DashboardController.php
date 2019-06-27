<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Prato;
use App\Contacto;
use App\Cliente;
use Brian2694\Toastr\Facades\Toastr;




class DashboardController extends Controller
{
public function index(){

    $reservationCount = Reservation::count();
    $pratoCount = Prato::count();
    $contactoCount = Contacto::count();
    $contactos = Contacto::all();
    $clienteCount = Cliente::count();
    $reservations = Reservation::where('status',true)->get();


    return view('admin.dashboard', compact('contactos','reservations','reservationCount','pratoCount','contactoCount','clienteCount'));
}
}

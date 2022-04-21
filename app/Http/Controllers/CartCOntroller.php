<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartCOntroller extends Controller
{
    public function update(){
        $cart= auth()->user()->cart;
        $cart->status= 'Pending';
        $cart->save();

        $notification='Tu pedido se ha registrado correctamente. Te contactaremos via mail!';
        return back()->with(compact('notification'));
    }

    public function pedido(){
        $cart= auth()->user()->cart;
        $cart->status= 'Pending';
        $cart->save();


        $cp= $_POST['cp'];
        $colonia= $_POST['colonia'];
        $calle= $_POST['calle'];
        $numero= $_POST['numero'];
        $mensaje= $_POST['mensaje'];
        $t= $_POST['t'];
        $direccion="Direccion: ".$cp.", ".$colonia.", ".$calle.", ".$numero;
        $final=$mensaje." ".$t." -- ".$direccion;

        $url= "https://api.whatsapp.com/send?phone=525561425090&text=$final";
        $url=str_replace(PHP_EOL, '', $url);
        header("Location: $url");
        exit;
    }
}

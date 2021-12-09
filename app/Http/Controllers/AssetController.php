<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function wallet(){

      $assets = \App\Models\Asset::where( 'owner_id' , auth()->id() )->get();
      $data = \App\Models\Cryptocurrency::getData('500');

      return view('wallet' , compact('assets' , 'data'));
    }

    public function store(){

      $asset = new \App\Models\Asset;

      $data = \App\Models\Cryptocurrency::getData('500');

      $asset->name = request('name');
      $asset->owner_id = auth()->id();
      $asset->usd = request('usd');

      foreach ($data as $arr) {
        if($asset->name == $arr->name){
          $asset->symbol = $arr->symbol;
        }
      }

      if(request('price')){
        $asset->price = request('price');
        $asset->value = round(request('usd')/request('price') , 4);
      } elseif(request('value')){
        $asset->value = request('value');
        $asset->price = round(request('usd')/request('value') , 2);
      }

      $asset->save();

      return redirect('/wallet');
    }

    public function destroy($id){

      \App\Models\Asset::find($id)->delete();
      return redirect('/wallet');

    }
}

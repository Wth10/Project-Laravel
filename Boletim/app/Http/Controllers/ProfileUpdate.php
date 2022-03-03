<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileUpdate extends Controller
{
    
    public function update(Request $request)
    {
        auth()->user()->update($request->only(['name', 'email']));

        if($request->input( key: 'password')){
            auth()->user()->update([
                'password' => bcrypt ( value: $request->input( key: 'password'))
            ]);
        }

        return redirect()->action([PageController::class, 'profile'])->with('status', 'Alteração Feita Com Sucesso!');
    }
}

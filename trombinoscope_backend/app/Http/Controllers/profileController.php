<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'pole' => 'required',
            'poste' => 'required',
            'direction' => 'required',
            'number' => 'required',
            'email' => 'required',
            "id" => 'required'
        ]);
        
        User::where('id',$request->id)->update([
            'last_name' =>  $request->last_name,
            'poste' => $request->poste,
            'direction' => $request->direction,
            'pole' => $request->pole,
            'email' => $request->email,
            'number' => $request->number,
            'password' => $request->password != '' ?  Hash::make($request->password) : Hash::make('password')
        ]);

        return User::where('id',$request->id)->get()->toJson();
    }
}

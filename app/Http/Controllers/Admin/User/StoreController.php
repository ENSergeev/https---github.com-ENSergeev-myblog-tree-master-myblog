<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        // dd($request);
        $data=$request->validated();
        $data['password']=Hash::make($data['password']);
        User::firstOrCreate(['email'=> $data ['email']], $data);
        return redirect()->route('admin.user.index');
    }
}


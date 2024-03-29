<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

use App\Jobs\StoreUserJob;

use Illuminate\Support\Str;
use App\Mail\User\PasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        // dd($request);
        $data=$request->validated();
        // dd(777);
        StoreUserJob::dispatch($data);
        // $password = Str::random(10);
        // $data['password']=Hash::make($password);
        // $user = User::firstOrCreate(['email'=> $data ['email']], $data);
        // Mail::to($data['email'])->send(new PasswordMail($password));
        // event(new Registered($user));
        return redirect()->route('admin.user.index');
    }
}


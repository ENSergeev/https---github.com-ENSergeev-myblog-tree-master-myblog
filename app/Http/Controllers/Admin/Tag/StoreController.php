<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        // dd($request);
        $data=$request->validated();
        // dd($data);
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    } 
}


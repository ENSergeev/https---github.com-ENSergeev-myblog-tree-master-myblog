<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Category;
use App\Service\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Post;

class BaseController extends Controller
{
    public $service;
    public function __construct(PostService $service){
        $this->service =$service;

    } 
}


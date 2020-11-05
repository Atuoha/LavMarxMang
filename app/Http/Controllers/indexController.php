<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class indexController extends Controller
{
    //

    public function index(){
        $bookmarks = Bookmark::paginate(5);
        return view('index', compact('bookmarks'));
    }

    
}

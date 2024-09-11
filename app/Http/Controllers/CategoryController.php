<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = new Category();

    }
    public function index()
    {
        $response['categories_'] = $this->category->all();
        return view('category.index')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */

}

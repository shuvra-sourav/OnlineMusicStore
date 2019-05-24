<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Redirect;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @param  String               $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, String $slug = null)
    {
        if(!is_null($category->slug))
        {
            if(is_null($slug))
            {
                return Redirect::to(route('category.show', array($category, $category->slug)), 301);
            }
            else
            {
                if($slug !== $category->slug)
                {
                    return Redirect::to(route('category.show', array($category, $category->slug)), 301);
                }
            }
        }

        $songs = $category->songs()->paginate(36);
        
        return view('layout.categories.show', compact('category', 'songs'));
    }


}

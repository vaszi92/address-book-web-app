<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = \App\Category::all();
                return view('/categories', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{       
                return view('add_category');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateCategoryRequest $request)
	{
                \App\Category::create($request->all());
                return redirect('/categories');
                
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = \App\Category::find($id);
                if(is_null($category))
                {
                    return redirect('categories');
                }
                return view('category_details', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{       
                $category = \App\Category::findOrFail($id);
		return view('edit_category', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\UpdateCategoryRequest $request)
	{
		$category = \App\Category::findOrFail($id);
                $category->update($request->all());
                return redirect('/categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{       
                $category = \App\Category::findOrFail($id);
                if($category->contacts->isEmpty()){
                    $category->delete();
                    return redirect('/categories');
                } else {
                    flash('You cannot delete a category with associated contacts.');
                    return redirect('/categories');
                }
	}

}

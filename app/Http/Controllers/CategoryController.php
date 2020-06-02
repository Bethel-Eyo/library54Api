<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller {
    public $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
    $this->middleware('auth');
      $this->categoryRepo = $categoryRepo;
    }

    public function create(Request $request){
        return $this->categoryRepo->createCategory($request->all());
    }

    public function update(Request $request){
        return $this->categoryRepo->updateCategory($request->all());
    }

    public function delete($id){
        return $this->categoryRepo->deleteCategory($id);
    }
}
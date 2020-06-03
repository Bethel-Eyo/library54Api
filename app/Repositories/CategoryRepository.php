<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

use App\Models\Cat;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository{
    public function __construct(Cat $model) 
    {
        parent::__construct($model);
    }

    public function createCategory(array $data){
        try{
            $category = $this->fillAndSave([
                'id' => $this->generateUuid(),
                'name' => $data['name'],
            ]);
            return response()->json(['category' => $category], 201);
        }catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function updateCategory(array $data){
        try{
            $category = $this->find($data['cat_id']);
            $category->update([
                'name' => $data['name']
            ]);
            return response()->json(['data' => 'category updated successfully'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function deleteCategory($id){
        try{
            return response()->json([
                'artisan' => Cat::where('id', $id)->delete(),
                'message' => 'category was deleted successfully'
            ]);
          }catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
          }
    }

    public function getCategories(){
        return response()->json(['categories' =>  Cat::all()], 200);
    }
}
<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Repositories\BaseRepository;

class BookRepository extends BaseRepository{
    public function __construct(Book $model) 
    {
        parent::__construct($model);
    }

    public function createBook(array $data){
        try{
            $book = $this->fillAndSave([
                'id' => $this->generateUuid(),
                'book_title' => $data['book_title'],
                'cat_id' => $data['cat_id']
            ]);
            return response()->json(['book' => $book], 201);
        }catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function updateBook(array $data){
        try{
            $book = $this->find($data['id'])->update([
                'book_title' => $data['book_title']
            ]);

            return response()->json(['data' => 'book has been updated successfully'], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }
    }

    public function deleteBook($id){
        try{
            return response()->json([
                'artisan' => Book::where('id', $id)->delete(),
                'message' => 'book was deleted successfully'
            ]);
          }catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
          }
    }
}
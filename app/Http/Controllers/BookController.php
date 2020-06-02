<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;

class BookController extends Controller {
    public $bookRepo;

    public function __construct(BookRepository $bookRepo)
    {
      $this->bookRepo = $bookRepo;
    }

    public function create(Request $request){
        return $this->bookRepo->createBook($request->all());
    }

    public function update(Request $request){
        return $this->bookRepo->updateBook($request->all());
    }

    public function delete($id){
        return $this->bookRepo->deleteBook($id);
    }

    public function getBooks(){
        return $this->bookRepo->getBooks();
    }

    public function getCategoryBooks($id){
        return $this->bookRepo->getCategoryBooks($id);
    }
}
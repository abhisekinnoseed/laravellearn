<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Book;

class BookController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
      //
   	 $books=Book::all();
        return view('books.index',compact('books'));
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
      //
   	return view('books.create');
   }
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
      //
   //	 $book=Request::all();
   	$book=$request->all();
   Book::create($book);
   return redirect('books');
   }
   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
      //
   	 $book=Book::find($id);
   return view('books.show',compact('book'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
      //
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id)
   {
      //
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
      //
   }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookController extends Controller
{ 
        //VIEW BOOKS
        function list()
        {
            $books=Book::get();
            return view('books',
            ['books'=>$books,]);
        }
        //show book
        function show($id)
        {
            //select book with id = $id
            $book=Book::where('id','=',$id)->first();
            //return view for this book
            return view('show',
            ['book'=>$book,]);
        }


        //create
        function create()
        {
            return view('create');
        }
         //edit
        function edit($id)
        {
            //get the book 
            $book=Book::find($id);
            //return
            return view('edit',
            ['book'=>$book
            ]);

        }


        //VALIDATOR AND INSERT DB
        function store(Request $request)
    {
        //validator  /// 
        $validator = validator::make($request->all(),
        [
        'name'=>'required|max:100|min:3',
        'desc'=>'required|max:2000|min:3',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //if
        if($validator->fails()){
        return redirect('books/create')
        ->withErrors($validator)
        ->withInput();
        }
         //end validator//

        //process image
        
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name  = time().Str::random(30).Str::random(15).'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');
            
            $image->move($destinationPath, $name);
            $imagePath='images/'.$name;
        }


         // dd($request->all());
        $_name=$request->name;
        $_desc=$request->desc;

         //insert into db 
        $book=new Book();
        $book->name=$_name;
        $book->desc=$_desc;
        $book->image=$imagePath;
        $book->save();
        
        return redirect('/list');
        //end store
            //list

        

    }

         //VALIDATOR ANA UPDATE DB
        function update($id, Request $request)
    {    //validator  /// 
        $validator = validator::make($request->all(),
        [
            'name'=>'required|max:100|min:3',
            'desc'=>'required|max:20000|min:3',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //if validator  
        if($validator->fails())
        {
            return redirect('books/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
         //end validator//
        
        
        //inputs
        $_name=$request->name;
        $_desc=$request->desc;
        
        
        //select
        $book=Book::find($id);
        $book->name=$_name;
        $book->desc=$_desc;



         //if image exists        
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name  = time().Str::random(30).Str::random(15).'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');
            
            $image->move($destinationPath, $name);
            $imagePath='images'.$name;
            if(isset($book->image))
            // unlink($book->image);
            $book->image=$imagePath;
        }


        $book->save();
        
        return redirect('/list'); 
        
    }


      //DELETE
    function delete($id)
    {
        //get book
        $book=Book::find($id);
        if(isset($book->image))
        unlink($book->image);
        $book->delete();

        return redirect('list');
    }




}
?>
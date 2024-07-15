<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\confirm;

class BooksController extends Controller
{
    //
    public function index()
    {
        $lists = DB::table('books')->get();
        return view('lab3.list', compact('lists'));
    }

    public function formAdd()
    {
        $categories = DB::table('categories')->get();
        return view('lab3.add', compact('categories'));
    }

    public function add(Request $request)
    {
        $data = [
            'title' => $request['title'],
            'thumbnail' => $request['thumbnail'],
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'publication' => $request['publication'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'category_id' => $request['category_id'],
        ];
        DB::table('books')->insert($data);
        return redirect()->route('/');
    }
    public function formUpdate($id)
    {
        $categories = DB::table('categories')->get();
        $product = DB::table('books')->where('id', '=', $id)->first();
        return view('lab3.update', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $data = [
            'title' => $request['title'],
            'thumbnail' => $request['thumbnail'],
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'publication' => $request['publication'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'category_id' => $request['category_id'],
        ];
        DB::table('books')->where('id', $request['id'])->update($data);
        return redirect()->route('/');
    }
    public function delete($id)
    {
        DB::table('books')->delete($id);
        return redirect()->route('/');
    }
}

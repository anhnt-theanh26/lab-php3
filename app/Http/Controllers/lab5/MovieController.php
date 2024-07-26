<?php

namespace App\Http\Controllers\lab5;

use App\Http\Controllers\Controller;
use App\Models\lab5\Gene;
use App\Models\lab5\Moive;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index()
    {
        $movies = Moive::orderBy('id', 'desc')->paginate(8);
        $genes = Gene::all();
        return view('lab5.index', compact('movies', 'genes'));
    }

    public function formAdd()
    {
        $genes = Gene::all();
        return view('lab5.add', compact('genes'));
    }

    public function add(Request $request)
    {
        $data = $request->except('poster');
        $data['poster'] = '';
        if ($request->hasFile('poster')) {
            $path_image  =  $request->file('poster')->store('image');
            $data['poster'] = $path_image;
        }
        Moive::create($data);
        return redirect()->route('/')->with('success', 'Thêm thành công phim');
    }

    public function delete(Moive $movie)
    {
        $movie->delete();
        $old_image = $movie['poster'];
        if (file_exists('storage/' . $old_image)) {
            unlink('storage/' . $old_image);
        }
        return redirect()->route('/')->with('success', 'Xóa thành công phim');
    }

    public function formUpdate(Moive $movie)
    {
        $genes = Gene::all();
        return view('lab5.update', compact('movie', 'genes'));
    }

    public function update(Moive $movie, Request $request)
    {
        $data = $request->except('poster');
        $old_image = $movie['poster'];
        if ($request->hasFile('poster')) {
            $path_image  =  $request->file('poster')->store('image');
            $data['poster'] = $path_image;
        }
        $movie->update($data);
        if (isset($path_image)) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
        }
        return redirect()->back()->with('success', 'Cập nhật thành công phim');
    }


    public function detail(Moive $movie)
    {
        $genes = Gene::all();
        return view('lab5.detail', compact('movie', 'genes'));
    }
    public function search(Request $request)
    {
        $movies = Moive::where('title', 'like', '%' . $request->input('search') . '%')->paginate(8);
        $genes = Gene::all();
        return view('lab5.index', compact('movies', 'genes'));
    }
}

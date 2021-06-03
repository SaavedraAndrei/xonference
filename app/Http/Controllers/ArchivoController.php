<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;


class ArchivoController extends Controller
{
    
    public function index()
    {
        $files = File::orderBy('created_at','DESC')->paginate(30);
        return view('file.index',['files' => $files]);
    }

    public function create()
    {
        return view('file.upload');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|max:20000'
        ]);

        $upload = $request->file('file');
        $path = $upload->store('public/storage');
        $file = file::create([
            'title' => $upload->getClientOriginalName(),
            'description' => '',
            'path' => $path,
        ]);

        return redirect('/file')->with('success','La carga del archivo ha sido existoso');

    }

    public function show($id)
    {
        $dl = File::find($id);
        return Storage::download($dl->path,$dl->title);
    }

}

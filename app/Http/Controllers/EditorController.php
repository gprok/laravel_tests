<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function tinymce()
    {
        return View('editor/tinymce');
    }

    public function tinymce_process(Request $request)
    {
        echo $request->description;
    }
}

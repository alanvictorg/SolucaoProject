<?php
/**
 * Copyright (c) 2016. Include Tecnologia http://includetecnologia.com.br
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $filename = Storage::disk('public')->putFile('', $request->file('filexml'));

        $filepath = public_path('uploads/'.$filename);

        $directory = public_path('uploads/files');
        if(!file_exists($directory)){
            //criar
            mkdir($directory, 0777);
        }
        $rar_arch = $this->descompress_rar($filepath);
        $content = file_get_contents($directory.'/'.$rar_arch);
        unlink($filepath);
        $xml=simplexml_load_string($content) or die("Error: Cannot create object");
        //json_encode($xml);
        dd($xml);
    }

    protected function descompress_rar($filepath)
    {
        $archive = rar_open($filepath);
        $entries = $archive->getEntries();
        foreach ($entries as $entry) {
            $file = $entry->extract(public_path('uploads/files'));
            $file_name = $entry->getName();
        }
        $archive->close();


        return $file_name;
    }
}

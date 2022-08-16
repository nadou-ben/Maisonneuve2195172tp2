<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     
        $files = File::selectFiles();

           
        return view('uploadFile.index',['files'=>$files]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();
           
        return view('uploadFile.create',['files'=>$files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        $request->validate([
            'titre' => 'required|mimes:zip,pdf,docx,doc|max:2048',
            'titre_fr' => 'required|mimes:zip,pdf,docx,doc|max:2048'
            ]);
            $fileModel = new File;
            if($request->file()) {
                $titre = time().'_'.$request->titre->getClientOriginalName();
                $titre_fr = time().'_'.$request->titre_fr->getClientOriginalName();
                $filePath = $request->file('titre')->storeAs('uploads', $titre, 'public');
                $filePathFR = $request->file('titre_fr')->storeAs('uploads', $titre_fr, 'public');

                $fileModel->titre = time().'_'.$request->titre->getClientOriginalName();

                $fileModel->titre_fr = time().'_'.$request->titre_fr->getClientOriginalName();

                $fileModel->file_path = '/storage/' . $filePath;

                $fileModel->file_path_fr = '/storage/' . $filePathFR;

                $fileModel->etudientId = $id;

                $fileModel->save();
                $files = File::all();
                foreach ($files as $file){
                    if($file->etudientId == $id){
                        
                    back()->with('success','File has been uploaded.')
                    ->with('titre', $titre);
                    back()->with('success','File has been uploaded.')
                    ->with('titre_fr', $titre_fr);

                    return redirect(route('uploadFile.show', $fileModel->id));   
                     }
                }
            }         
    }         

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
       // return $id . " ".$file->etudientId;
        if($file->etudientId == $id){
       return view('uploadFile.show', ['file' => $file]);
        }else{
            return redirect(route('logout'));  
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        if($file->etudientId == $id){
       return view('uploadFile.edit', ['file' => $file]);
        }else{
            return redirect(route('logout'));  
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }

        $request->validate([
            'titre' => 'required|mimes:zip,pdf,docx,doc|max:2048',
            'titre_fr' => 'required|mimes:zip,pdf,docx,doc|max:2048'
            ]);
        $files = File::all();
        foreach ($files as $file){
            if(($file->titre == $request->titre)&&($file->titre_fr == $request->titre_fr)){
                $test = 1;
            }else{
                $test = 0;
            }
        }
        //return $test;
        if( $test ==  0){
       // return(file_exists(storage_path('app/public/uploads/'.$file->titre)));
        if(file_exists(storage_path('app/public/uploads/'.$file->titre)))
        unlink(storage_path('app/public/uploads/'.$file->titre));

        if(file_exists(storage_path('app/public/uploads/'.$file->titre_fr)))
        unlink(storage_path('app/public/uploads/'.$file->titre_fr));

      
            if($request->file()) {
                
                $titre = time().'_'.$request->titre->getClientOriginalName();
                $titre_fr = time().'_'.$request->titre_fr->getClientOriginalName();

                $filePath = $request->file('titre')->storeAs('uploads', $titre, 'public');
                
                $filePathFR = $request->file('titre_fr')->storeAs('uploads', $titre_fr, 'public');
             
                $file->update([
                    'titre' => time().'_'.$request->titre->getClientOriginalName(),
                    'titre_fr' => time().'_'.$request->titre_fr->getClientOriginalName(),
                    'file_path' => '/storage/' . $filePath,
                    'file_path_fr' => '/storage/' . $filePathFR,
                    'etudientId' => $id
                ]);
            
            }else{
                back()->with('file','File existe deja .')
                    ->with('titre', $request->titre)
                    ->with('titre_fr', $request->titre_fr);
                    
            }
        if($file->etudientId == $id){
        return redirect(route('uploadFile.show', $file->id));
        }else{
            return redirect(route('logout'));  
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
       if(file_exists(storage_path('app/public/uploads/'.$file->titre))){
        unlink(storage_path('app/public/uploads/'.$file->titre));
       }
        if(file_exists(storage_path('app/public/uploads/'.$file->titre_fr))){
        unlink(storage_path('app/public/uploads/'.$file->titre_fr));}

       
        if($file->etudientId == $id){
        return redirect(route('uploadFile.index'));
        }else{
            return redirect(route('logout'));  
        }
    }

    public function showPDF(File $file){
        $files = File::selectFiles();
        foreach($files as $fi){
        if($fi->id == $file->id){
        return response()->download(Storage::path('public/uploads/'.$fi->titre));
        }
        }
    }
}

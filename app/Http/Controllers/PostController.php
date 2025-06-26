<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Post;
use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Inyectar el servicio de la logica de creacion
    public function __construct(protected PostService $service)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //muestra todos los posts
        $posts = $this->service->getAll();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // inyeccion de la validacion:
    // public function store(<inyeccion del FormRequest>$request, )
    public function store(CreatePostRequest $request)
    {
        //la validacion la en el FormRequest de creacion

        /* $validated = $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            'status'=>'required|in:draft.published',
        ]); */

        // validar que la imagen viene
        // almacenarla en el storage
        // generarle un path/nombre

        // crear la logica de validacion
        $this->service->create($request->validated());
        /* Post::create([
            'title'=>$request->input('title'),
            // 'featured'=>$request->input('featured'),
            'content'=>$request->input('content'),
            'status'=>$request->input('status'),
        ]); */

        return redirect()->route('posts.index')->with('message', 'Post creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

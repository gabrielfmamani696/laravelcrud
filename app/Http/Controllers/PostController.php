<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
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
        // le mandamos uns instacia de post sin datos, para que devuelva algo, pero nada en particular
        return view('posts.form', [ 'post' => new Post() ]);
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
        // antes de mandar a crear el post en su servicio, la request se valida
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
    // aqui solo estamos buscando un post y cargando la vista con aquel que encuentre
    public function edit(int $id)
    {
        //econtrat el post
        $post = $this->service->find($id);
        // devuelve el crud encontrado al form, este ultimo genera la ruta edit en consecuencia
        return view('posts.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, int $id)
    {
        //
        $this->service->update($id, $request->validated());
        return redirect()->route('posts.index')->with('message', 'Post Actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->service->delete($id);
        return redirect()->route('posts.index')->with('message', 'Post Eliminado exitosamente!');
    }
}

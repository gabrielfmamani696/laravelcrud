<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

// En la service Class encapsulamos toda la lógica relacionada con una entidad, en este caso la entidad Post.
class PostService
{
    public function getAll(): LengthAwarePaginator
    {
        // se obtienen todos los objetos post ordenados en query
        $query = Post::latest();
        // los queries de paginan de 10 en 10 
        return $query->paginate(Post::PAGINATE);
    
    }
    // public function create(){
    //     return Post::create([
    //         'title'=>$request->input('title'),
    //         // 'featured'=>$request->input('featured'),
    //         'content'=>$request->input('content'),
    //         'status'=>$request->input('status'),
    //     ]);
    // }
    public function create(array $data): Post
    {
        return Post::create($data);
    }

}
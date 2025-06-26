<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

// En la service Class encapsulamos toda la lógica relacionada con una entidad, en este caso la entidad Post.
class PostService
{
    // el retorno es LengthAwarePaginator
    public function getAll(): LengthAwarePaginator
    {
        // se obtienen todos los post del ultimo al primero
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

    public function find(int $id):Post{
        return Post::findOrFail($id);
    }

    public function update(int $id, array $data): bool{
        return Post::where('id', $id)->update($data);
    }

    public function delete(int $id): bool {
        return Post::where('id', $id)->delete();
    }
}
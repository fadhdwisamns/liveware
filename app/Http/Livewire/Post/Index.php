<?php

namespace App\Http\Livewire\Post;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $title;
    public $content;

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(5)
        ]);
    }

    public function destroy($postId){
        $post = Post::find($postId);

        if($post){
            $post->delete();
        }
        session()->flash('message' , 'Data Berhasil Dihapus');

        return redirect()->route('post.index');
    }
    public function store(){
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = Post::create([
            'title' => $this->title,
            'content' => $this->content, 
        ]);

        session()->flash('message' , 'Data Berhasil Disimpan');

        return redirect()->route('post.index');

    }

}

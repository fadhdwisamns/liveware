<?php

namespace App\Http\Livewire\Post;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Index extends Component
{
    use WithPagination;

    public $title;
    public $content;
    public $postId;

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
        
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'User Created Successfully!']);
        session()->flash('message' , 'Data Berhasil Disimpan');

        return redirect()->route('post.index');

    }  
    public function edit($id){
        $post = Post::findOrFail($id);

        if($post){
             $this->postId = $post->id;
             $this->title = $post->title;
             $this->content = $post->content;
        }
        
    }
    public function update(){
        $this->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        if($this->postId) {
        $post = Post::find($this->postId);
        if($post){
            $post->update([
                'title' => $this->title,
                'content' => $this->content
                ]);
            }
        }
        session()->flash('message' , 'Data Berhasil Diperbarui');

        
    }
}

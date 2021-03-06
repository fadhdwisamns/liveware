<div>
    <table class="table table-bordered">
    <thead class = "thead-dark">
        <tr>
            <th scope="col">TITLE</th>
            <th scope="col">CONTENT</th>
            <th scope="col">AKSI</th>
        </tr>
    </thead>
    <tbody>
    <tr wire:ignore>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
                    <td>
                        <input type='text' name='title' wire:model='title' class='form-control' placeholder='Enter Title'>
                                            </td>
                    <td>
                        <input type='text' wire:model='content' name='content' class='form-control' placeholder='Enter Content'>
                                            </td>
                    <td>
                        <button wire:click='store' class='btn btn-success'>Save</button>
                    </td> 
                </tr>
        
        @foreach($posts as $index => $post)
        <tr wire:ignore>
        <input type="hidden" wire:model="postId">
            <td>
           <input type="text" name='title' wire:model="post.{{$index}}.title"  class="form-control @error('title') is-invalid @enderror">
           @error('title')
                        <span class="invalid-feedback">
                                {{ $message }}
                         </span>
                    @enderror    
        </td>
       
            <td>
            <input type="text" name='content' value="{{$post->content}}" class="form-control @error('content') is-invalid @enderror"  >
            </td>
            <td>
            <button wire:click.prevent="update0" class="btn btn-sm btn-success">Save</button>
            <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">Delete</button>
            </td>
            <td class="text-center">
               
            </td>
        </tr>
        @endforeach
        
        </tbody>
    </table>
    {{ $posts->links()}}
</div>

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
        @foreach($posts as $post)
        <tr wire:ignore>
            <td>
           <input type="text" name='title' value="{{$post->title}}" >
            </td>
            <td>
            <input type="text" name='content' value="{{$post->content}}" >
            </td>
            <td class="text-center">
                <!-- <a href="{{ route('post.edit', $post->id)}}"class="btn btn-sm btn-success">Save</a> -->
                <button wire:click="update({{ $post->id }})" class="btn btn-sm btn-success">Save</button>
                <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
</div>

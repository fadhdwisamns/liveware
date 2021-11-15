<div>
    <a href="{{ route('post.create')}}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
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
        <tr>
            <td>{{$post->title}}       
            </td>
            <td>{{$post->content}}</td>
            <td class="text-center">
                <a href="{{ route('post.edit', $post->id)}}"class="btn btn-sm btn-primary">EDIT</a>
                <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">DELETE</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
</div>

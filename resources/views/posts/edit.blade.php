<h1>Edit post</h1>
<br>
    <br>

<form  action="{{route('posts.update',$post->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name='title' value="{{$post->title}}">
    <br>
    <br><input type="text" name='body' value="{{$post->body}}">
    <br>
    <br>
<button type="submit">Updata</button>

</form>
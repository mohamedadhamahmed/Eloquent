


<h1>Create post</h1>
<br>
    <br>

<form  action="{{route('posts.store')}}" method="post">
    @csrf
    <input type="text" name='title' placeholder=" Enter Title">
    <br>
    <br><input type="text" name='body' placeholder=" Enter Title">
    <br>
    <br>
<button type="submit">submit</button>

</form>
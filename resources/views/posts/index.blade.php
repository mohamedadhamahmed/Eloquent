<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
  <br/><br/>
  <form  action="{{route('posts.show',9)}}" method="get">
    @method('GET')
    @csrf
    <button  type="submit">Show All Delete </button>

</form>
  <br/><br/>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($posts as $post)
         <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
          <td>{{$post->body}}  </td>
<td>
    <a class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">Updata</a>
    <br/><br/>
    <form  action="{{route('posts.destroy',$post->id)}}" method="post">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
</td>
          </tr>
         @endforeach
      
        </tbody>
      </table>



   
</body>
</html>
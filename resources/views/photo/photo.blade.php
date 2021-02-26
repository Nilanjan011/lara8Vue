<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=h1">
    <title>photo</title>
</head>
<body>
    <form action="{{route('photo.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <input type="file" name="p">
    <input type="submit" value="Submit">
    </form>
    <section>
        @forelse ($data as $item)
            <li>{{$item['id']}}</li>
            <li> <img src="{{asset('storage/'.$item["img"])}}" width="50">
                <a href="" onclick="if(confirm('Do you want to delete this customer?')) event.preventDefault(); document.getElementById('delete-{{$item['id']}}').submit();" class="btn btn-sm btn-outline-danger py-0">Delete</a>
                <form id="delete-{{$item["id"]}}" method="post" action="{{route('photo.destroy',$item["id"])}}" style="display: none;">
                @csrf
                @method('DELETE')
                </form>
            
            </li>
        @empty
            no data
        @endforelse
    </section>
</body>
</html>
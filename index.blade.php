<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO APP</title>
</head>

<body style="min-height: 95vh; display: flex; justify-content: center; align-items:center;">

    <div>
        <ul>
            <form style="margin-bottom: 10px;" action="{{ route('task.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Yeni Görev Girin">
                <button type="submit">Gönder</button>
            </form>
            @foreach ($tasks as $item)
                <li>
                    <form action="{{ route('task.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input style="margin-bottom:5px;" type="text" name="name" value="{{ $item->name }}">
                        <button type="submit">Güncelle</button>
                        <a href="{{ route('task.delete', $item->id) }}" style="color: red;">
                            Sil
                        </a>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    @if(session()->has('success'))
   <div  role="alert" style="position:fixed; bottom: 20px; right: 20px; background: rgb(8, 151, 8); padding: 10px 30px; color:white; border-radius:10px;">
       <strong>{{ session()->get('success') }}</strong>
   </div>
@endif
</body>

</html>

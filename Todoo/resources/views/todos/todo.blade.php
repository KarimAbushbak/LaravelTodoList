<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('/todos/css/app.css') }}">
</head>
<body>
   <main class="wrapper d-flex flex-column align-items-center justify-content-center">

    <form action="{{ route('create') }}" method="POST" class="todos-form d-flex align-items-center" >

        @csrf
        @if(session()->has('sucecess'))

        <div class=" alert alert-success text-capitalize rounded-0 mb-3">{{ session()->get('success') }}</div>

        @endif


        <input type="text" name="todo" class="@error('todo') border border-danger  @enderror form-control rounded-0" placeholder="Enter Task">

        <button class="btn btn-primary d-flex align-items-center justify-content-center text-capitlize rounded-0">add</button>


        @error('todo')
        <div class="alert alert-danger text-capitalize rounded-0 mt-3">{{ $message }}</div>

        @enderror
    </form>
    <div class="todos-list mt-3">

        @foreach ($todos as $todo)
        <div class="item d-flex align-items-center flex-wrap">

            <p class="text">{{ $todo->todo }}</p>

            <div class="actions d-flex align-items-center w-100  mt-3 pt-3 border-top">

                

                <form action="{{ route('delete',['id'=> $todo ->id]) }}" method="POST" class="delet-todo-form">
                    @csrf
                    <button class="btn btn-danger rounded-0 d-flex align-items-center">Delete</button>
                </form>
            
        </div>
        </div>
        

        @endforeach
        

    </div>

    
   </main>
</body>
</html>
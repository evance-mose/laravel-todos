<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
</head>
<body class="bg-gray-200 p-4 font-sans">
    <div class="lg:w-2/4 mx-auto py-8 bg-white rounded-xl ">
        <h1 class="font-bold text-5xl text-center mb-8">Todo List</h1>

        <div class="mb-6 ">
            <form class="flex flex-col space-y-4 mx-6 " method="post" action="{{ route('todos.store') }}">
                @csrf
                <input type="text" name="title" class="px-4 py-3 bg-gray-100 border rounded-xl" placeholder="The todo title">
                <textarea name="description" id="description"placeholder="The todo descriptio"  class="px-4 py-3 bg-gray-100 border rounded-xl"></textarea>
                <button class="w-28 py-4 px-2 bg-green-500 text-white rounded-xl">Add</button>
            </form>
        </div>

        <hr>
        <div class="mt-2 mx-6">
            
            @foreach($todos as $todo)     
            <div @class(['py-4 flex space-between border-green-300 px-3', $todo->completed ? 'bg-green-200' : ''])>
                <div class="flex-1 pr-8">
                    <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                    <p class="text-gray-500">{{$todo->description}}<p/>
                </div>
                <div class="flex space-x-3">
                    <form action="{{ route('todos.update', $todo->id) }}" method="post">
                        @csrf 
                        @method('put')
                    <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                          </svg>
                    </button>
                    </form>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                        @csrf 
                        @method('delete')
                    <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                    </button>
                    </form>
                </div>

            </div>
            @endforeach


        </div>


    </div>
    
</body>
</html>
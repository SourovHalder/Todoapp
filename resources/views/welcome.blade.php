@extends('layouts.app')
@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="text-center" style= "width: 40%">
<h1 class="display-2 text-white">Todo App</h1>
<h2 class="text-white pt-5">what's next? add something to your list </h2>
<form action="{{route('todo.store')}}" method="POST">
    @csrf
    <div class="input-group mb-3 w-100">
        <input type="text" class="form-control form-control-lg " name='title' placeholder="type here" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
        <button class="btn btn-success" type="submit" id="button-addon2">Add to the list</button>
        
    </div>
</div>
</form>
<h2 class="text-white pt-2">My Todo List </h2>
<div>
    <div class="bg-white w-100">

        @foreach ($todos as $todo)
        <div class="w-100 d-flex align-items-center justify-content-between">
            <div class="p-4">@if($todo->completed==0)
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="2" />
                  </svg>
                @else   
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="9 11 12 14 20 6" />
                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                  </svg>
                @endif{{$todo->title}}</div>
          
        <div class="mr-4 d-flex align-items-center" >
         @if ($todo->completed == 0)
         <form action="{{route('todo.update',$todo->id)}}" method="POST">
            @method('PUT')
            @csrf                               
            <input type= "text" name="completed"  value="1" hidden>
            <button class ="btn btn-success"> mark it as completed</button>
        </form>
        @else
        <form action="{{route('todo.update',$todo->id)}}" method="POST">
            @method('PUT')
            @csrf                               
            <input type= "text" name="completed"  value="0" hidden>
            <button class ="btn btn-warning"> mark it as uncompleted</button>
        </form>
        
        @endif
    <a class="inlane-block" href="{{route('todo.edit', $todo->id)}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
          </svg>
    </a>
          <form action="{{route('todo.destroy', $todo->id)}}" method="POST"> 
         @csrf
         @method('DELETE')
         <button class="border-0 bg-transparent ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#F44336" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="7" x2="20" y2="7" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
              </svg></button>
          </form>
        </div>

    </div>
         
        @endforeach
</div>
</div>
</div>
    
@endsection
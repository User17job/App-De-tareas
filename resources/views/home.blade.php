<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>To-Do App</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/8246/8246320.png">

    <!-- BOOTSTRAP STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP STYLES END\ -->
    <!-- FONT AWESOME ICONS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600&display=swap" rel="stylesheet">
    <!-- FONT AWESOME ICONS END\ -->

    <!-- MY STYLES -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- MY STYLES END\ -->
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--JQUERY END\-->

</head>
<body class=" text-dark">
    <div class="object">
        <div class="lightEffec" id="luz1"></div>
        <div class="lightEffect" id="luz2"></div>
        <div class="lightEffect__inner"id="luz3"></div>
        <div class="lightEffect__inner--"id="luz4"></div>
        <div class="lightEffect__inner---" id="luz5"></div>
        <figure>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-lightbulb img" id="light-on" viewBox="0 0 16 16">
            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"/>
            </svg>
   
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-lightbulb-fill img" viewBox="0 0 16 16" id="light-off">
            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
            </svg>
        </figure>
    </div> 

    <div class="container-fluid p-3">
        <h1 class="text-center" id="h1">To-Do List</h1>
        <div class="row justify-content-center p-2 mt-2" id="sectionContainer">
            <div class="col-md-7 p-0" id="wrapper">
                <!-- Todo list -->
                <section class="" id="toDo">
                    <div class="content mt-5">
                        <div class="link" id="link">User17job</div>
                        <form action="{{ route('store') }}" method="POST" autocomplete="off" id="form-1" class="content__form">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="tarea" id="task" class="toDo__input" placeholder="Enter task" />
                                <button type="submit" class="toDo__btn btn btn-sm fs-5 text-light bg-primary">ADD</button>
                            </div>
                        </form>
                        
                        <!-- Task list -->
                        <section class="mt-4 p-3" id="contenido">
                            @if(count($todolists))
                            <ul class="list-group list-group-flush mt-1">
                                @foreach($todolists as $todolist)
                                <li class="list-group-item bgbg d-flex flex-column align-items-start">

                                    <form action="{{ route('destroy', $todolist->id) }}" id="form-{{ $loop->index }}" class="w-100" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="d-flex flex-column flex-md-row w-100 align-items-start align-items-md-center">
                                            <div class="d-flex align-items-center mb-2 mb-md-0">

                                                <button type="button" class="toDo__btn2 btn  mr-2 add" id="add-{{ $loop->index }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                    </svg>
                                                </button>
                                                <button type="submit" class="toDo__btn2 btn btn-sm" id="delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </button>
                                                <div class="contain mr-2">
                                                    {{-- <input type="checkbox" class="task-checkbox" data-id="{{ $todolist->id }}" {{ $todolist->completed ? 'checked' : '' }}> --}}
                                                    <input type="checkbox" id="cbx-{{ $loop->index }}"  class="task-checkbox form__input" name="complete?" value="complete"  data-id="{{ $todolist->id }}" {{ $todolist->completed ? 'checked' : ''}} style="display: none;" />
                                              
                                                    <label for="cbx-{{ $loop->index }}" class="check">
                                                        <svg width="33px" height="33px" viewBox="0 0 18 18">
                                                            <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                                            <polyline points="1 9 7 14 15 4"></polyline>
                                                        </svg>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form__tarea flex-grow-1" id="tarea">{{ $todolist->tarea }} </div>
                                        </div>
                                    </form>
                                    
                                    <form action="{{ route('storeSubtask', $todolist->id) }}" id="subtask-form-{{ $loop->index }}" class="w-100 mt-2 d-none" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            
                                            <input type="text" name="subtarea" class="form-control" placeholder="Añadir subtarea...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Añadir</button>
                                            </div>
                                        </div>
                                    </form>
                        
                                    @if($todolist->subtasks->count())
                                    <ul class="w-100 list-group list-group-flush mt-2 subTarea">
                                        @foreach($todolist->subtasks as $subtask)
                                        <li class="contenedor list-group-item d-flex justify-content-between align-items-center ml-4">
                                            <form action="{{ route('destroySubtask', $subtask->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm Dbtn  mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <div class="subTareaL">
                                                {{ $subtask->subtarea }}
                                            </div>

                                            <div class="form-check ml-4">
                                                <input type="checkbox" class="subtask-checkbox" id="completeSubtask-{{ $subtask->id }}"  data-id="{{ $subtask->id }}" {{ $subtask->complete ? 'checked' : '' }}>
                                                {{-- <input class="form-check-input" type="checkbox" value="complete" id="completeSubtask-{{ $subtask->id }}" @if($subtask->complete) checked @endif> --}}
                                                <label class="form-check-label" for="completeSubtask-{{ $subtask->id }}"></label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                <hr>
                                @endforeach
                            </ul>
                            @endif
                        </section>

                        <!-- task list -->
                    {{-- <section class="mt-4 p-3" id="contenido">
                        @if(count($todolists))
                        <ul class="list-group list-group-flush mt-1">
                            @foreach($todolists as $todolist)
                            <li class="list-group-item bgbg d-flex flex-column align-items-start">
                                <form action="{{ route('destroy', $todolist->id) }}" id="form-{{ $loop->index }}" class="w-100" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex flex-column flex-md-row w-100 align-items-start align-items-md-center">
                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <button type="button" class="toDo__btn2 btn mr-2 add" id="add-{{ $loop->index }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                </svg>
                                            </button>
                                            <button type="submit" class="toDo__btn2 btn btn-sm" id="delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </button>
                                            <div class="contain mr-2">
                                                <input type="checkbox" id="cbx-{{ $loop->index }}" name="complete?" value="complete" class="form__input" data-id="{{ $todolist->id }}" {{ $todolist->completed ? 'checked' : '' }} style="display: none;" />
                                                <label for="cbx-{{ $loop->index }}" class="check">
                                                    <svg width="33px" height="33px" viewBox="0 0 18 18">
                                                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                                        <polyline points="1 9 7 14 15 4"></polyline>
                                                    </svg>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form__tarea flex-grow-1" id="tarea">{{ $todolist->tarea }}</div>
                                    </div>
                                </form>

                                <form action="{{ route('storeSubtask', $todolist->id) }}" id="subtask-form-{{ $loop->index }}" class="w-100 mt-2 d-none" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="subtarea" class="form-control" placeholder="Añadir subtarea...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Añadir</button>
                                        </div>
                                    </div>
                                </form>
                            
                                @if($todolist->subtasks->count())
                                <ul class="w-100 list-group list-group-flush mt-2 subTarea">
                                    @foreach($todolist->subtasks as $subtask)
                                    <li class="contenedor list-group-item d-flex justify-content-between align-items-center ml-4">
                                        <form action="{{ route('destroySubtask', $subtask->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm Dbtn mr-2">
                                                <!-- SVG icon -->
                                            </button>
                                        </form>
                                        <div class="subTareaL">
                                            {{ $subtask->subtarea }}
                                        </div>
                                    
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="checkbox" value="complete" id="completeSubtask-{{ $subtask->id }}" @if($subtask->complete) checked @endif>
                                            <label class="form-check-label" for="completeSubtask-{{ $subtask->id }}"></label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            <hr>
                            @endforeach
                        </ul>
                        @endif
                    </section> --}}

                    </div>
                </section>
            </div>
        </div>
    </div>
    

<label class="switch" id="switche">
    <div class="round">
        <input name="onoff" id="onoff" type="checkbox">
        <div class="back">
            <label for="onoff" class="but">
                <span class="on">0</span>
                <span class="off">I</span>
            </label>
        </div>
    </div>
</label>

<script src="{{asset('js/script.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


</body>
</html>
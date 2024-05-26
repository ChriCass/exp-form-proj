<!-- resources/views/livewire/admin-todo-list.blade.php -->

<div>
    <div class="card">
        <div class="header">
            <h2>
                <strong>Lista de </strong>Pendientes
            </h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onClick="return false;" class="dropdown-toggle"
                        data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#" onClick="return false;">Action</a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">Another action</a>
                        </li>
                        <li>
                            <a href="#" onClick="return false;">Something else here</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="tdl-content">
                <ul class="to-do-list ui-sortable">
                    @foreach ($tasks as $task)
                    <li class="clearfix">
                        <div class="form-check m-l-10">
                            <label class="form-check-label"> 
                                <input class="form-check-input" type="checkbox" wire:click="toggleTask({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                                {{ $task->task }}
                                <span class="form-check-sign"> <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="todo-actionlist pull-right clearfix">
                            <a href="#" wire:click="deleteTask({{ $task->id }})">
                                <i class="material-icons">clear</i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <input type="text" class="tdl-new form-control-radious" placeholder="Enter Todo..." wire:model="newTask" wire:keydown.enter="addTask">
        </div>
    </div>
</div>

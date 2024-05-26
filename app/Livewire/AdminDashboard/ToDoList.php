<?php

namespace App\Livewire\AdminDashboard;

use Livewire\Component;
use App\Models\ToDo;
class ToDoList extends Component
{
    public $tasks;
    public $newTask;

    public function mount()
    {
        $this->tasks = ToDo::all();
    }

    public function addTask()
    {
        $this->validate([
            'newTask' => 'required|string|max:255',
        ]);

        ToDo::create(['task' => $this->newTask]);
        $this->newTask = '';
        $this->tasks = ToDo::all();
    }

    public function toggleTask($taskId)
    {
        $task = ToDo::find($taskId);
        $task->completed = !$task->completed;
        $task->save();
        $this->tasks = ToDo::all();
    }

    public function deleteTask($taskId)
    {
        ToDo::find($taskId)->delete();
        $this->tasks = ToDo::all();
    }

    public function render()
    {
        return view('livewire.admin-dashboard.to-do-list');
    }
}

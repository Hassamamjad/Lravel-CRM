<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        $users = User::all();
        return view('task', compact('tasks' , 'users'));
    }


    public function create()
    {
        $users = User::all(); 
        return view('tasks.create', compact('users'));
    }


    public function taskCreate(Request $request)
    {
        $filePath=null;
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('images'), $filename);
            $filePath= "/"."images"."/".$filename;
        }

        $validated = [
            'title' => $request->title,
            'project_type' => $request->project_type,
            'status' => 1,
            'target_date' => $request->target_date,
            'priority' => $request->priority,
            'user_id' => $request->user_id,
            'notes' => $request->notes,
            'attachment'=>$filePath 
        ];

        // 'attachment' => ,
        // if ($request->hasFile('attachment')) {
        //     // Validate the file type and size
        //     $request->validate([
        //         'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // 2MB max size
        //     ]);

        //     // Store the file in the "uploads/attachments" directory inside "storage/app/public"
        //     $path = $request->file('attachment')->store('uploads/attachments', 'public');

        //     // Add the file path to the validated data array
        //     $validated['attachment'] = $path;
        // }

        // Create a new task with the validated data
        Task::create($validated);

        // Redirect back with success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    
    }

    public function testUpload(Request $request)
{


    if ($request->hasFile('attachment')) {
        $image = $request->file('attachment');
        
        $filename = time() . '.' . $image->getClientOriginalExtension();
        
        $image->move(public_path('images'), $filename);
        $filePath= "/"."images"."/".$filename;
        return $filePath;

    }
    
}
public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Delete the attached file if it exists
        if ($task->attachment) {
            Storage::disk('public')->delete($task->attachment);
        }

        // Delete the task from the database
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;

class TaskController extends Controller
{
    public function index(int $id)
    {
    	//全フォルダの取得
    	$folders = Folder::all();

    	//選択されたフォルダの取得
    	$current_folder = Folder::find($id);

    	//選択されたフォルダ内のタスクを取得
    	$tasks = $current_folder->tasks()->get();

    	return view('tasks/index', [
    		'folders' => $folders,
    		'current_folder_id' => $current_folder->id,
    		'tasks' => $tasks
    	]);
    }
}

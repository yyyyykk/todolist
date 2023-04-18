<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * foldersテーブルよりidに紐づくtasksテーブルの全データを取得
     * 
     */
    public function index(int $id)
    {
        // 全てのフォルダを取得
        $folders = Folder::all();

        // idで絞り込む
        $current_folder = Folder::find($id);

        // folder_idで絞り込んだタスクを取得
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * GET /folders/{id}/tasks/create
     */
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }
}

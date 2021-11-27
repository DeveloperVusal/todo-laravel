<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Метод контроллера добавления задачи
     * 
     * @access public
     * @return array
     */
    public function add(Request $request)
    {
        $service = new TaskService();

        return $service->add($request);
    }

    /**
     * Метод контроллера изменения задачи
     * 
     * @access public
     * @return array
     */
    public function edit(Request $request)
    {
        $service = new TaskService();

        return $service->edit($request);
    }

    /**
     * Метод контроллера изменения состояния задачи
     * 
     * @access public
     * @return array
     */
    public function completed(Request $request)
    {
        $service = new TaskService();

        return $service->completed((int)$request->input('id'));
    }

    /**
     * Метод контроллера получения кол-ва выполненых задач
     * 
     * @access public
     * @return array
     */
    public static function countCompleted($list_id = null)
    {
        return TaskService::countCompleted((int)$list_id);
    }
}

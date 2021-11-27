<?php

namespace App\Services;

use App\Services\ListService;
use App\Services\TaskService;

class PageService {
    /**
     * Метод отображения нужного шаблона для страницы
     * 
     * @param string $page
     * @param object $request
     * @access public
     * @return object
     */
    public function page_view($page, $request)
    {
        switch ($page) {
            case 'home':            
                $list_title = '';
                $lists = ListService::all();

                if ($request->input('list')) {
                    $tasks = TaskService::all($request->input('list'));
                    $list_title = ListService::getDataId($request->input('list'))->name;
                } else {
                    $tasks = TaskService::all();
                }
                
                return view('pages.Home.index', [
                    'meta_title' => 'Todo List - HalalGo',
                    'list_title' => $list_title,
                    'list_id' => (int)$request->input('list'),
                    'lists' => $lists,
                    'tasks' => $tasks,
                ]);
                break;
            
            default:
                # code...
                break;
        }
    }
}
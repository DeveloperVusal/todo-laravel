<?php

namespace App\Http\Controllers;

use App\Services\ListService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Метод контроллера создания листа
     * 
     * @access public
     * @return array
     */
    public function create(Request $request)
    {
        $service = new ListService();

        return $service->create($request);
    }

    /**
     * Метод контроллера сохранения листа
     * 
     * @access public
     * @return array
     */
    public function save(Request $request)
    {
        $service = new ListService();

        return $service->save($request);
    }

    /**
     * Метод контроллера удаления листа
     * 
     * @access public
     * @return array
     */
    public function remove(Request $request)
    {
        $service = new ListService();

        return $service->remove((int)$request->input('id'));
    }
}

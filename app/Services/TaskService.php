<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaskService {
    /**
     * Метод получения всех задач
     * 
     * @param integer $listId = null
     * @access public
     * @static
     * @return object
     */
    public static function all($listId = null)
    {   
        if (empty((int)$listId)) return DB::table('tasks')->orderByDesc('id')->get();
        elseif((int)$listId) return DB::table('tasks')->where(['list_id' => $listId])->orderByDesc('id')->get();
    }

    /**
     * Метод получения кол-ва выполненых задач
     * 
     * @param integer $listId = null
     * @access public
     * @static
     * @return object
     */
    public static function countCompleted($listId = null)
    {   
        if (empty((int)$listId)) {
            $count = DB::table('tasks')
                       ->where('is_completed', 1)
                       ->count();
            
            return $count;
        } elseif((int)$listId) {
            $count = DB::table('tasks')
                       ->where('is_completed', 1)
                       ->where(['list_id' => $listId])
                       ->count();
            
            return $count;
        }
    }

    /**
     * Метод получения данных конкретной задачи
     * 
     * @param integer $id
     * @access public
     * @static
     * @return object
     */
    public static function getDataId($id)
    {
        return DB::table('tasks')->where('id', $id)->get()[0];
    }

    /**
     * Метод добавления задачи
     * 
     * @param object $req
     * @access public
     * @return array
     */
    public function add($req)
    {
        // Валидация отправленных данных
        $validator = Validator::make($req->all(), [
            'list_id' => 'required|min:1',
            'name' => 'required|min:1',
            'parent_id' => 'integer|nullable',
            'description' => 'nullable'
        ]);

        $errors = $validator->errors();

        if (count($errors)) {
            return [
                'status' => 'error',
                'code' => 0,
                'message' => 'Invalid inputs',
                'errors' => $errors
            ];
        } else {
            $id = DB::table('tasks')->insertGetId([
                'list_id' => $req->input('list_id'),
                'user_id' => 1,
                'name' => $req->input('name'),
                'description' => ($req->input('description')) ? $req->input('description') : '',
                'created_at' => date('Y-m-d H:i:s'), //'CURRENT_TIMESTAMP()'
            ]);

            if ($id) {
                return [
                    'status' => 'success',
                    'code' => 0,
                    'message' => 'Task successfully created'
                ];
            } else {
                return [
                    'status' => 'error',
                    'code' => 1,
                    'message' => 'An error occured while creating the task'
                ];
            }
        }
    }

    /**
     * Метод изменения задачи
     * 
     * @param object $req
     * @access public
     * @return array
     */
    public function edit($req)
    {
        // code
    }

    /**
     * Метод изменения состояния задачи
     * 
     * @param integer $id
     * @access public
     * @return array
     */
    public function completed($id)
    {
        // Иначе обновляем данные списка
        $upd = DB::table('tasks')
                ->where('id', $id)
                ->update([
                    'is_completed' => DB::raw('!`is_completed`'),
                    'updated_at' => date('Y-m-d H:i:s'), //'CURRENT_TIMESTAMP()'
                ]);

        // Если список успешно создан
        if ($upd) {
            return [
                'status' => 'success',
                'code' => 0,
                'message' => 'Task successfully update completed'
            ];
        // Иначе возвращаем ошибку
        } else {
            return [
                'status' => 'error',
                'code' => 1,
                'message' => 'An error occured while updating the task'
            ];
        }
    }

    /**
     * Метод удаления задачи
     * 
     * @param integer $id
     * @access public
     * @return array
     */
    public function remove($id)
    {
        // Пытаемся удалить список
        $del = DB::table('tasks')->where('id', $id)->delete();

        // Если список успешно удален
        if ($del) {
            return [
                'status' => 'success',
                'message' => 'Task successfully deleted'
            ];
        // Иначе возвращаем ошибку
        } else {
            return [
                'status' => 'error',
                'message' => 'An error occurred while deleting the task'
            ];
        }
    }
}
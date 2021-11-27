<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ListService {
    /**
     * Метод получения всех списков
     * 
     * @access public
     * @static
     * @return object
     */
    public static function all()
    {
        return DB::table('lists')->orderByDesc('id')->get();
    }

    /**
     * Метод получения данных конкретного списка
     * 
     * @param integer $id
     * @access public
     * @static
     * @return object
     */
    public static function getDataId($id)
    {
        return DB::table('lists')->where('id', $id)->get()[0];
    }

    /**
     * Метод создания списка
     * 
     * @param object $req
     * @access public
     * @return array
     */
    public function create($req)
    {
        // Валидация отправленных данных
        $validator = Validator::make($req->all(), [
            'name' => 'required|min:1'
        ]);

        // Если имеются ошибки
        if ($validator->fails()) {
            return [
                'status' => 'error',
                'code' => 0,
                'message' => 'Empty of name'
            ];
        }
        
        // Иначе создаем список
        $id = DB::table('lists')->insertGetId([
            'name' => $req->input('name'),
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'), //'CURRENT_TIMESTAMP()'
        ]);

        // Если список успешно создан
        if ($id) {
            return [
                'status' => 'success',
                'code' => 0,
                'message' => 'List successfully created'
            ];
        // Иначе возвращаем ошибку
        } else {
            return [
                'status' => 'error',
                'code' => 1,
                'message' => 'An error occured while creating the list'
            ];
        }
    }

    /**
     * Метод сохранения списка
     * 
     * @param object $req
     * @access public
     * @return array
     */
    public function save($req)
    {
        // Валидация отправленных данных
        $validator = Validator::make($req->all(), [
            'id' => 'required|integer',
            'name' => 'required|min:1'
        ]);

        $errors = $validator->errors();

        // Если имеются ошибки
        if (count($errors)) {
            return [
                'status' => 'error',
                'code' => 0,
                'message' => 'Invalid inputs',
                'errors' => $errors
            ];
        }
        
        // Иначе обновляем данные списка
        $upd = DB::table('lists')
                ->where('id', $req->input('id'))
                ->update([
                    'name' => $req->input('name'),
                    'user_id' => 1,
                    'updated_at' => date('Y-m-d H:i:s'), //'CURRENT_TIMESTAMP()'
                ]);

        // Если список успешно создан
        if ($upd) {
            return [
                'status' => 'success',
                'code' => 0,
                'message' => 'List successfully updated'
            ];
        // Иначе возвращаем ошибку
        } else {
            return [
                'status' => 'error',
                'code' => 1,
                'message' => 'An error occured while updating the list'
            ];
        }
    }

    /**
     * Метод удаления списка
     * 
     * @param integer $id
     * @access public
     * @return array
     */
    public function remove($id)
    {
        // Пытаемся удалить список
        $del = DB::table('lists')->where('id', $id)->delete();

        // Если список успешно удален
        if ($del) {
            return [
                'status' => 'success',
                'message' => 'List successfully deleted'
            ];
        // Иначе возвращаем ошибку
        } else {
            return [
                'status' => 'error',
                'message' => 'An error occurred while deleting the list'
            ];
        }
    }
}
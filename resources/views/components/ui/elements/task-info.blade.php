<span class="text-bold text-dark fs-4">
    Выполнено {{ App\Http\Controllers\TaskController::countCompleted($list_id) }} из {{ count($tasks) }}
</span>
import { api_list_create } from './list-create'
import { api_list_remove } from './list-remove'
import { api_list_save } from './list-save'

import { api_task_add } from './task-add'
import { api_task_completed } from './task-completed'
import { api_task_remove } from './task-remove'

export const $api = {
    list_create: api_list_create,
    list_save: api_list_save,
    list_remove: api_list_remove,
    task_add: api_task_add,
    task_remove: api_task_remove,
    task_completed: api_task_completed
}
import { task_add } from './task-add'
import { list_create } from './list-create'

export default [
    {
        name: 'task_add',
        func: task_add
    },
    {
        name: 'list_create',
        func: list_create
    },
]
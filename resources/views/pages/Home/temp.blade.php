<div class="container-xl mt-5">
    <div class="row">
        <div class="col">
            <h3>Список задач @if (mb_strlen($list_title)) — {{ $list_title }} @endif</h3>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <div class="todo-sidebar">
            @include('components.forms.list-create')
            @include('components.navs.sidebar')
        </div>
        <div class="todo-content">
            <div class="d-flex mb-3 justify-content-between">
                @include('components.ui.elements.task-info')
                @include('components.forms.task-add')
            </div>
            @if(count($tasks))
                @foreach ($tasks as $item)
                    <div class="card mb-3 w-100" id="task-{{ $item->id }}">
                        <div class="card-body">
                            <h5 class="card-title @if ($item->is_completed) text-secondary @endif">{{ $item->name }}</h5>
                            <p class="card-text @if ($item->is_completed) text-secondary @endif">{{ $item->description }}</p>

                            @if ($item->is_completed)
                                <button type="button" name="btn-cp-task" id="rt-id-{{ $item->id }}" class="btn btn-success">Выполнено</button>
                            @else
                                <button type="button" name="btn-cp-task" id="rm-id-{{ $item->id }}" class="btn btn-primary">Задача выполнена</button>
                            @endif

                            <button type="button" name="btn-rm-task" id="rm-id-{{ $item->id }}" class="btn @if ($item->is_completed) btn-secondary @else btn-danger @endif">Удалить</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-block text-center p-2">Задач нет</div>
            @endif
        </div>
    </div>
</div>
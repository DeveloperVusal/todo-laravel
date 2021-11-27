<ul class="nav flex-column">
    @if (count($lists))
        @foreach ($lists as $item)
            <li class="nav-item d-flex justify-content-between align-items-start" id="list-li-{{ $item->id }}">
                <a class="nav-link" href="/home/?list={{ $item->id }}">
                    {{ $item->name }}
                </a>

                <div class="d-inline d-flex justify-content-between align-items-center">
                    <button name="btn-edit-list" id="rm-edit-{{ $item->id }}" class="btn btn-none p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Редактировать лист">
                        @include('components.ui.icons.pencil-fill')
                    </button>

                    <button name="btn-rm-list" id="rm-id-{{ $item->id }}" class="btn btn-none p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Удалить лист">
                        @include('components.ui.icons.trash-fill')
                    </button>
                </div>
            </li>
        @endforeach
    @else
        <div class="d-block">Список пуст</div>
    @endif
</ul>
<form onsubmit="list_create(this); return false;">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" autocomplete="off" class="form-control" placeholder="Название списка" aria-label="Название списка" aria-describedby="button-addon2">
        <button class="btn btn-secondary" type="submit" id="button-addon2" data-bs-toggle="tooltip" data-bs-placement="right" title="Создать список">
            @include('components.ui.icons.journal-plus')
        </button>
    </div>
</form>
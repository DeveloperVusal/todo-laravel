<button 
  type="button" 
  class="btn btn-success btn-icon-padding" 
  onclick="openModal('ModalTaskAdd')" 
  data-bs-toggle="tooltip" 
  data-bs-placement="left" 
  title="Добавить задачу"
>
  @include('components.ui.icons.circle-plus')
</button>
  
<div class="modal fade" style="display: block;z-index: -1055;" id="ModalTaskAdd" tabindex="-1" aria-labelledby="ModalTaskAddLabel">
    <div class="modal-dialog modal-dialog--width">
      <div class="modal-content">
        <form onsubmit="task_add(this); return false;">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTaskAddLabel">Новая задача</h5>
            <button type="button" class="btn-close" onclick="closeModal('ModalTaskAdd')"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="task-name" class="col-form-label">Название задачи*:</label>
              <input type="text" autocomplete="off" class="form-control" id="task-name" name="name" />
            </div>
            <div class="mb-3">
              <label for="task-descr" class="col-form-label">Дополнительная информация:</label>
              <textarea class="form-control form-control--max-height form-control--min-height" id="task-descr" name="description"></textarea>
            </div>
            <div class="alert alert-danger p-2 d-none">
              <ul></ul>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal('ModalTaskAdd')">Отмена</button>
            <button type="submit" class="btn btn-primary">Добавить</button>
          </div>
        </form>
      </div>
    </div>
</div>
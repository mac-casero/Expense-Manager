<div class="modal fade" id="update-category-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Update Category')</h4>
      </div>
      <form id="update_category_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="category_id_update"  class="form-control" name="category_id_update" required>
            <div class="form-group">
              <label class="label">@lang('Display Name')</label>
              <input type="text" id="name_update" class="form-control" maxlength="20" name="name_update" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Description')</label>
              <input type="text" id="description_update"  class="form-control" maxlength="20" name="description_update" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_category_submit" onclick="expenseCategory.confirmDeleteCategory()">@lang('Delete')</button>
          <button type="submit" class="btn btn-primary" id="update_category_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delete-category-confirmation" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('Delete Category')</h5>
        </div>
          <div class="modal-body">
              @lang('Are you sure you want to delete this category? Expenses under this category will also be deleted.')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="expenseCategory.submitDeleteCategory()">@lang('Delete')</button>
            <button type="button" class="btn btn-default" onclick="expenseCategory.closeDeleteCategory()">@lang('Close')</button>
          </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="create-category-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Add Category')</h4>
      </div>
      <form id="create_category_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div>
            <div class="form-group">
              <label class="label">@lang('Display Name')</label>
              <input type="text" id="name_create" class="form-control" maxlength="20" name="name_create" required>
              </select>
            </div>
            <div class="form-group">
              <label class="label">@lang('Description')</label>
              <input type="text" id="description_create" class="form-control" maxlength="100" name="description_create" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary" id="create_category_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="update-role-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Update Role')</h4>
      </div>
      <form id="update_role_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="role_id_update"  class="form-control" name="role_id_update" required>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_role_submit" onclick="roles.confirmDeleteRole()">@lang('Delete')</button>
          <button type="submit" class="btn btn-primary" id="update_role_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="update-admin-role-error-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Update Administrator Role')</h4>
      </div>
        <div class="modal-body">
        @lang('Administrator role cannot be updated.')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete-role-confirmation" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang('Delete Role')</h5>
        </div>
          <div class="modal-body">
              @lang('Are you sure you want to delete this role? Users with this role will also be deleted.')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="roles.submitDeleteRole()">@lang('Delete')</button>
            <button type="button" class="btn btn-default" onclick="roles.closeDeleteRole()">@lang('Close')</button>
          </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="update-user-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Update User')</h4>
      </div>
      <form id="update_user_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div>
            <div class="form-group">
            <input type="hidden" id="user_id_update"  class="form-control" name="user_id_update" required>
              <label class="label">@lang('Name')</label>
              <input type="text" id="name_update" class="form-control" maxlength="30" name="name_update" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Email Address')</label>
              <input type="email" id="email_update" class="form-control" maxlength="30" name="email_update" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Role')</label>
              <select id="role_update" class="form-control" name="role_update" required>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_user_submit" onclick="users.submitDeleteExpense()">@lang('Delete')</button>
          <button type="submit" class="btn btn-primary" id="update_user_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="update-admin-user-error-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Update Administrator User')</h4>
      </div>
        <div class="modal-body">
        @lang('Administrator users cannot be updated.')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
    </div>
  </div>
</div>


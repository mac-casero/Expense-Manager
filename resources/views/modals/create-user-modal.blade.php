<div class="modal fade" id="create-user-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Add User')</h4>
      </div>
      <form id="create_user_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div>
            <div class="form-group">
              <label class="label">@lang('Name')</label>
              <input type="text" id="name_create" class="form-control" maxlength="30" name="name_create" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Email Address')</label>
              <input type="email" id="email_create" class="form-control" maxlength="30" name="email_create" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Role')</label>
              <select id="role_create" class="form-control" name="role_create" required>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary" id="create_user_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>


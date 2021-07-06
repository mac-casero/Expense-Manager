<div class="modal fade" id="create-expense-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Add Expense')</h4>
      </div>
      <form id="create_expense_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div>
            <div class="form-group">
              <label class="label">@lang('Expense Category')</label>
              <select id="expense_cetegory_create" class="form-control" name="expense_cetegory_create" required>
              </select>
            </div>
            <div class="form-group">
              <label class="label">@lang('Amount ($)')</label>
              <input type="text" id="amount_create" class="form-control" maxlength="20" name="amount_create" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Entry Date')</label>
              <input type="date" id="entry_date_create" class="form-control" name="entry_date_create"  min="2018-01-01" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary" id="create_expense_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>


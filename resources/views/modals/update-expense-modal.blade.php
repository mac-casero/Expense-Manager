<div class="modal fade" id="update-expense-modal" role="dialog" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">@lang('Update Expense')</h4>
      </div>
      <form id="update_expense_form" method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="expense_id_update"  class="form-control" name="expense_id_update" required>
            <div class="form-group">
              <label class="label">@lang('Expense Category')</label>
              <select id="expense_cetegory_update" class="form-control" name="expense_cetegory" required>
                <option default disabled selected value=""></option>
              </select>
            </div>
            <div class="form-group">
              <label class="label">@lang('Amount ($)')</label>
              <input type="text" id="amount_update" pattern="[0-9]+(\.[0-9]{1,2})?%?" class="form-control" maxlength="20" name="amount_update" required>
            </div>
            <div class="form-group">
              <label class="label">@lang('Entry Date')</label>
              <input type="date" id="entry_date_update" class="form-control" name="entry_date_update"  min="2018-01-01" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_expense_submit" onclick="expenses.submitDeleteExpense()">@lang('Delete')</button>
          <button type="submit" class="btn btn-primary" id="update_expense_submit">@lang('Submit')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
        </div>
      </form>
    </div>
  </div>
</div>


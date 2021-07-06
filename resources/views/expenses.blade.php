@extends('layouts.app')

@section('content')
<div class="container" id="msform">
  <div class="alert alert-success" style="display:none">
    <strong>Success!</strong>
  </div>
  <fieldset>
    <h2 class="fs-title">@lang('Expenses')</h2>
    <button id="add_expense_btn" class="btn btn-primary btn-sm mb-3"  data-toggle="modal" onclick="expenses.displayCreateModal()" data-target="#create-expense-modal" >@lang('Add Expense')</button>
    <table id="expenses-table" class="display" style="width:100%" aria-hidden="true">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
    </table>
  </fieldset>
  <script>expenses.onLoad()</script>
</div>

@include('modals.create-expense-modal')
@include('modals.update-expense-modal')
@endsection

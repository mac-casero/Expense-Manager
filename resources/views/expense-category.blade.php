@extends('layouts.app')

@section('content')
<div class="container" id="msform">
  <div class="alert alert-success" style="display:none">
    <strong>Success!</strong>
  </div>
  <fieldset>
    <h2 class="fs-title">@lang('Expense Category')</h2>
    <button id="add_category_btn" class="btn btn-primary btn-sm mb-3"  data-toggle="modal" data-target="#create-category-modal" >@lang('Add Category')</button>
    <table id="expense-category-table" class="display" style="width:100%" aria-hidden="true">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
    </table>
  </fieldset>
  <script>expenseCategory.onLoad()</script>
</div>

@include('modals.create-category-modal')
@include('modals.update-category-modal')
@endsection

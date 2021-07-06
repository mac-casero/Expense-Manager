@extends('layouts.app')

@section('content')
<div class="container" id="msform">
  <fieldset>
    <h2 class="fs-title">@lang('Users')</h2>
    <button id="add_user_btn" class="btn btn-primary btn-sm mb-3"  data-toggle="modal" onclick="users.displayCreateModal()" data-target="#create-user-modal" >@lang('Add User')</button>
    <table id="users-table" class="display" style="width:100%" aria-hidden="true">
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
  <script>users.onLoad()</script>
</div>

@include('modals.create-user-modal')
@include('modals.update-user-modal')
@endsection

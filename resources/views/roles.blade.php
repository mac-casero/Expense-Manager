@extends('layouts.app')

@section('content')
<div class="container" id="msform">
  <div class="alert alert-success" style="display:none">
    <strong>Success!</strong>
  </div>
  <fieldset>
    <h2 class="fs-title">@lang('Roles')</h2>
    <button id="add_role_btn" class="btn btn-primary btn-sm mb-3"  data-toggle="modal" data-target="#create-role-modal" >@lang('Add Role')</button>
    <table id="roles-table" class="display" style="width:100%" aria-hidden="true">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
    </table>
  </fieldset>
  <script>roles.onLoad()</script>
</div>

@include('modals.create-role-modal')
@include('modals.update-role-modal')
@endsection

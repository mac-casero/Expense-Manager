@extends('layouts.app')

@section('content')
<div class="container" id="msform">
  <fieldset>
    <h2 class="fs-title">@lang('Dashboard')</h2>
    <div>
      <div class="dashboard-items" id="table-section">
        <table id="expense-category-total-table" class="display" aria-hidden="true">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="dashboard-items" id="pie-chart-section">
        <div id="no-data-display" style="display:none"> No Data Available</div>
        <canvas id="expense-pie-chart" style="display:none"></canvas>
      </div>
  </div>
  </fieldset>
  <script>dashboard.onLoad()</script>
</div>
@endsection

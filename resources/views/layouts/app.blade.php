<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/bootstrap.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        @auth
		<nav id="sidebar">
			<div class="p-4 pt-5">
                <ul class="list-unstyled components mb-5">
                    @permission('Dashboard')
                    <li>
                        <a href="{{url('')}}/home">Home</a>
                    </li>
                    @endpermission
                    @permission('User Management')
                    <li>
                        <a href="#userManagementSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User Management</a>
                        <ul class="collapse list-unstyled" id="userManagementSubMenu">
                            <li>
                                <a href="{{url('')}}/user-management/roles">Roles</a>
                            </li>
                            <li>
                                <a href="{{url('')}}/user-management/users">Users</a>
                            </li>
                        </ul>
                    </li>
                    @endpermission
                    <li>
                        <a href="#expenseManagementSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Expense Management</a>
                        <ul class="collapse list-unstyled" id="expenseManagementSubMenu">
                            @permission('Expense Category')
                            <li>
                                <a href="{{url('')}}/expense-management/expense-category">Expense Categories</a>
                            </li>
                            @endpermission
                            @permission('Expense')
                            <li>
                                <a href="{{url('')}}/expense-management/expenses">Expenses</a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                </ul>
	        </div>
    	</nav>
        @endauth
        <div id="content">
        @auth
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        @else
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="width: 100%;">
        @endauth
            <div class="container">
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item" style="padding: 0.25rem 1rem;color: #2978B5;font-size: 16px;font-weight: 500;">
                            {{ __('Welcome to Expense Manager') }}
                            </li>
                        @auth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-primary-outline">
                                    {{ __('Log out') }}
                                </button>
                            </form>
                        @endauth
                    </ul>

            </div>
        </nav>

        @yield('content')
    </div>
    </div>
    
    <script>navbar.onLoad();</script>
</body>
</html>

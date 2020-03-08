<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css
    " rel="stylesheet"/>
    <style>

.cbtn {
  border: none;
  background-color: inherit;
  padding: 10px 10px;
  font-size: 14px;
  cursor: pointer;
  display: inline-block;
}


    </style>
    <!-- Scripts -->
      <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
    </script>
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-primary navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar sky-blue"></span>
                        <span class="icon-bar sky-blue"></span>
                        <span class="icon-bar sky-blue"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       IE-PMS
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <h3 class="text-center">Login</h3>

                        @else
                        <ul class="nav navbar-nav navbar-right">

                        <!-- <li>
                            <a href="#" @click="toggleShowTasks('Tasks')">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                Tasks
                                <span v-show="pending" class="text-danger">(@{{pending}})</span>

                            </a>
                        </li> -->

                        <!-- <li>
                            <a href="#" @click="toggleShowTasks('archived')">
                                <span class="glyphicon glyphicon-inbox"></span>
                                Archived Tasks
                                <span v-show="archived" class="text-danger">(@{{archived}})</span>

                            </a>
                        </li> -->
                        <li>
                            <a href="#" @click="toggleShowTasks('#')">
                                <span class="glyphicon glyphicon-inbox"></span>
                                Activity
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/plan') }}">
                                <span class="glyphicon glyphicon-inbox"></span>
                                Weekly Plan
                            </a>
                        </li>
                        <li>
                            <a href="#" @click="toggleShowTasks('#')">
                                <span class="glyphicon glyphicon-inbox"></span>
                                Daily Plan
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                {{ Auth::user()->name }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-out"></span>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <button type="submit" name="logout">Logout</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->

<script  language="JavaScript" type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
<script  language="JavaScript" type="text/javascript" src="js/addTask.js"></script>

<script src="/js/app.js"></script>

</body>
</html>

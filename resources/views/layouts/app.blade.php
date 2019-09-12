<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', "Test")</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')
        {{ Html::style('css/main.css') }}
        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content-header">
                    @yield('page-header')
                </section>
                <section class="content">
                   @yield('content')
                </section>
            </div>


        </div>
        <!-- JavaScripts -->
        @yield('before-scripts')
        {{ Html::script('js/jquery-1.11.3.min.js') }}

        {{ Html::script('js/main.js') }}
        @yield('after-scripts')
    </body>
</html>
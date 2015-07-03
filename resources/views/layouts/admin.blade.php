<html>
<head>
    <title>App Name - @yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/bower_components/medium-editor/dist/css/medium-editor.min.css">
    <link rel="stylesheet" href="/bower_components/medium-editor/dist/css/themes/flat.css">
    <!-- Font Awesome for awesome icons. You can redefine icons used in a plugin configuration -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">


    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">



</head>


<body>
<script src="/bower_components/medium-editor/dist/js/medium-editor.js"></script>

<!-- JS -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/handlebars/handlebars.runtime.min.js"></script>
<script src="/bower_components/jquery-sortable/source/js/jquery-sortable-min.js"></script>
<!-- Unfortunately, jQuery File Upload Plugin has a few more dependencies itself -->
<script src="/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>

<script src="/bower_components/medium-editor-insert-plugin/dist/js/medium-editor-insert-plugin.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.js"></script>


@section('sidebar')
    This is the master sidebar.
@show


<h1>Prova layout</h1>

<div class="container">


    @yield('content')
</div>
</body>
</html>

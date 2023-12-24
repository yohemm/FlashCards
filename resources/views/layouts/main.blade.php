<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('title') - FlashCard</title>
    @include('includes.linker')
    @yield('includes')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

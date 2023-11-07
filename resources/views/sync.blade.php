<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sync Stats Page</title>
</head>
<body>
<h1>Sync Stats Page</h1>
<h3>Execution Time: {{ $executionTime }}</h3>
<h3>Film Count: {{ $filmCount }}</h3>
<h3>Character (People) Count: {{ $characterCount }}</h3>
<button><a href="{{ route('sync') }}">Sync Again</a></button>
</body>
</html>
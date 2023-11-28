<!DOCTYPE html>
<html>
<head>
    <title>Laravel Sum Example</title>
</head>
<body>
    <p>Generated Array: [{{ implode(', ', array_slice($numbers, 0, 10)) }}...]</p>
    <p>Sum of 100,000 random numbers: {{ $sum }}</p>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bar Verification</title>
</head>
<body>
    <main>
        <p><strong>Bar ID:</strong> {{ $bar->public_id }}</p>
        <p><strong>Owner Name:</strong> {{ $bar->owner?->name ?? 'Not assigned yet' }}</p>
    </main>
</body>
</html>

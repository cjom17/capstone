<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
# Contact Form Submission

**Name:** {{ $formData['name'] }}

**Email:** {{ $formData['email'] }}

**Message:**
{{ $formData['message'] }}
</body>
</html>
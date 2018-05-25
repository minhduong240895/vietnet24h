
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
    Hi {{ $member->name }},
    <br>
    Thank you for creating an account with us. Don't forget to complete your registration!
    <br>
    <strong>Here is Your verify code:</strong>
    <h3>{{$verification_code}}</h3>

    <br/>
</div>

</body>
</html>
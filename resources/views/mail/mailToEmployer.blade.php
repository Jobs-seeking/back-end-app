<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail from PN</title>
</head>
<body>

    <h2>Hi {{$mailData['name']}},</h2>
    <p>There is a new applicant who applied for your posted job! Who name's
        <b> {{ $mailData['student']}}</b>
    </p>
    <p>Visit <a href={{ $mailData['cv']}} >This link</a> to see his/her CV </p>
    <p>Visit <a href={{ $mailData['cover_letter']}} >This link</a> to download his/her cover letter </p>
    <p>Thanks to use our service</p>
</body>
</html>

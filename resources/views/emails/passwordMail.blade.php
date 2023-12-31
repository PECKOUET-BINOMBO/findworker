<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Bakeli Tontine</title>
</head>

<body>

    <div>
        <!-- Ajouter une image dans le mail -->
        <div class="imgEmail">
            <img src="https://dub01pap001files.storage.live.com/y4m2x0fBoZwLOKk8RLWQ3QLTfZqHFU1SIf6JcyL5BhmxtBLMxyBWdCwAMSTBc6TZB5Yr8_vgcsDFv-H_ol3-GQjpd9tYwkaAUJdXR9N6uOrDf5KIterRQgSPLHbJVhEvHgia3nivMFKloBtLbjgb5cCgMdZVnwFJCK_lkZq5ZqJ2KMRkpQXWLWoRemTD7kEkQXbwtdyT6WxmA7gp5TVhFcY12A1y52lY5Z8IPASSgMYDU0?encodeFailures=1&width=500&height=211" height="200">
        </div>

        <h3>Cher {{$mailData['nom']}},</h3>
        <p style=" font-size: 14px; line-height: 1.5; text-align: justify;">Nous avons récemment reçu une demande de réinitialisation de votre mot de passe associée à votre compte sur la plateforme Find Worker. Vous avez la possibilité de procéder à la réinitialisation en cliquant sur le lien ci-dessous :</p>


        <p style=" font-size: 14px; line-height: 1.5; text-align: justify;">{{$mailData['lien']}}</p>
        <p style=" font-size: 14px; line-height: 1.5; text-align: justify;">Si cette demande ne provient pas de vous et que vous n'avez pas l'intention de réinitialiser votre mot de passe, nous vous invitons à ne pas tenir compte de cet e-mail. Dans ce cas, votre mot de passe actuel demeurera inchangé.
        </p>

        <p style=" font-size: 14px; line-height: 1.5; text-align: justify;">Cordialement,</p>
        <p style=" font-size: 14px; line-height: 1.5; text-align: justify;">L'équipe Find Worker</p>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>

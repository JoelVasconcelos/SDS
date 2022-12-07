<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google_Login</title>

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
    <meta name="google-signin-client_id" content="945204837953-fo8k667g757gdqk6rsca7heoi7gsqrt9.apps.googleusercontent.com">

</head>

<body>


<!--<script>-->
<!--    function handleCredentialResponse(response) {-->
<!--        const data = jwt_decode(response.credential)-->
<!--        console.log(data)-->
<!---->
<!--        fullName.textContent = data.name-->
<!--        sub.textContent = data.sub-->
<!--        given_name.textContent = data.given_name-->
<!--        family_name.textContent = data.family_name-->
<!--        emailG.textContent = data.email-->
<!--        verifiedEmail.textContent = data.email_verified-->
<!--        picture.setAttribute("src", data.picture)-->
<!---->
<!---->
<!--    window.onload = function () {-->
<!--        google.accounts.id.initialize({-->
<!--            client_id: "945204837953-fo8k667g757gdqk6rsca7heoi7gsqrt9.apps.googleusercontent.com",-->
<!--            callback: handleCredentialResponse-->
<!--        });-->
<!--        google.accounts.id.renderButton(-->
<!--            document.getElementById("buttonDiv"),-->
<!--            { theme: "outline",-->
<!--                size: "large" }-->
<!--        );-->
<!--        google.accounts.id.prompt();-->
<!--    }-->
<!--</script>-->

<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var userID = profile.getId();
        var userName = profile.getName();
        var userPicture = profile.getImageUrl();
        var userEmail = profile.getEmail();
        var userToken = googleUser.getAuthResponse().id_token;

        if(userEmail !== ''){
            var dados = {
                userID:userID,
                userName:userName,
                userPicture:userPicture,
                userEmail:userEmail
            };
            $.post('validaLoginGoogle.php', dados, function(retorna){
                if(retorna === '"erro"'){
                    var msg = "Usuário não encontrado com esse e-mail";
                    document.getElementById('msg').innerHTML = msg;
                }else{
                    window.location.href = retorna;
                }

            });
        }else{
            var msg = "Usuário não encontrado!";
            document.getElementById('msg').innerHTML = msg;
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<main class="container">
    <h2>Login</h2>
    <form method="post" action="validaLogin.php">
        <div class="input-field">
            <input type="text" name="email" id="email"
                   placeholder="Email">
            <div class="underline"></div>
        </div>
        <div class="input-field">
            <input type="password" name="senha" id="senha"
                   placeholder="Senha">
            <div class="underline"></div>
        </div>

        <input type="submit" value="Entrar" name="Login">
        <input type="submit" value="Inscrever-se" name="Inscrever">
    </form>

    <div class="footer">
        <span>Ou faça login com Google</span>
        <div id="buttonDiv"></div>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <p id='msg'></p>
    </div>


</main>

<!--<p id="fullName"></p>-->
<!--<p id="sub"></p>-->
<!--<p id="given_name"></p>-->
<!--<p id="family_name"></p>-->
<!--<p id="emailG"></p>-->

</body>

</html>
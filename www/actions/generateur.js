var copyBtn = document.getElementById('copy');

function getPassword(){
    var chars="0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    var passwordLength= 16;
    var password= "";

    //générer le mot de passe
    for(let i = 0; i < passwordLength ; i++){
        let randomNumber = Math.floor(Math.random() * chars.length)

        password += chars.substring(randomNumber , randomNumber + 1)

        //afficher le mot de pass
        document.getElementById('password').value = password;

    }
}
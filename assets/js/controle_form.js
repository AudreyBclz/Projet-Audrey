//à faire contrôle si pseudo déjà utilisé

function controle_inscription()
{
    var email=document.getElementById("email").value;
    var email_conf=document.getElementById("conf_email").value;
    var mdp=document.getElementById("MdP").value;
    var conf_mdp=document.getElementById("conf_MdP").value;
    var testForm = true;

    if(email !== email_conf)
    {
        alert("Erreur lors de la confirmation du mail");
        testForm=false;
    }
    else if (mdp.length<6)
    {
        alert("Mot de passe trop court, il faut 6 caractères minimum");
        testForm=false;
    }
    if( mdp !== conf_mdp)
    {
        alert("Erreur lors de la confirmation du mot de passe");
        testForm=false;
    }
    if (testForm)
    {
        document.getElementById("form_inscription").submit();
    }
}
document.getElementById("inscription").addEventListener("click",controle_inscription,false);
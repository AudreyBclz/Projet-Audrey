function controlProno()
{
    var decimal_test=/^[0-9]+\.?[0-9]*$/;
    var goodType=true,
        missValue=false;


    for (let i=1;i<=10;i++)
        {
            if (!(document.getElementsByName("match"+i)[0].checked||document.getElementsByName("match"+i)[1].checked||document.getElementsByName("match"+i)[2].checked))
            {
                missValue=true;
            }
            else if (!(decimal_test.test(document.getElementsByName("mount"+i)[0].value)))
                    {
                        goodType=false;
                    }
        }
        if(!goodType)
        {
            alert("Erreur dans l'écriture dans les montants, veuillez réessayer");
        }
        if (missValue)
        {
            alert('Il vous manque un résultat, veuillez réessayer');
        }
        if (goodType && !missValue)
        {
            document.getElementById("formulaire").submit();
        }
}
document.getElementById("parier").addEventListener("click",controlProno,false);
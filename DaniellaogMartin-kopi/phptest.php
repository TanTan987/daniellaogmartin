<?php
include "Admincheck.php";

$db = mysqli_connect("localhost", "root", "", "vm");

if(!$db){

    die("Kunne ikke kople til DB server." . mysqli_error($db));
}

if (isset($_POST["registrer"])){

    $fnavn = $_POST["fnavn"];
    $enavn = $_POST["enavn"];

    $sql = "INSERT INTO Utover (fornavn, etternavn)";
    $sql .= "VALUES ('$fnavn', '$enavn')";
    mysqli_query($db, $sql);

        echo "Utover er lagt til";

    }

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Prosjekt oppgave</title>
    <script type="text/javascript">

function valider_fnavn(){
    regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
    OK = regEx.test(document.skjema.fnavn.value);
    if(!OK)
    {
        document.getElementById("feilFnavn").innerHTML="Feil i navnet";
        return false;
    }

    document.getElementById("feilFnavn").innerHTML="";
    return true;

}
function valider_enavn()
{
    regEx = /^[a-zA-ZæøåÆØÅ .\-]{2,20}$/;
    OK = regEx.test(document.skjema.enavn.value);
    if(!OK)
    {
        document.getElementById("feilEnavn").innerHTML="Feil i navnet";
        return false;
    }
    document.getElementById("feilEnavn").innerHTML="";
    return true;
}

function valider_alle()
{
    $fnavnOK = valider_fnavn();
    $enavnOK = valider_enavn();
    if($fnavnOK && $enavnOK)
    {
        return true;
    }
    else
    {
        return false;
    }
    }

    </script>
    </head>
    <body>
        <div class="header">
            <h1>Legg til utøver</h1>
        </div>
        <form action="" method="post" name="skjema" onsubmit="return valider_alle()">
            <table>
        <tr>
                    <td>Fornavn:</td>
                    <td><input type="text" name="fnavn" onchange="valider_fnavn()" required></td>
                    <td><div id="feilFnavn" style="padding: 5px;">*</td>
        </tr>
        <tr>
                    <td>Etternavn:</td>
                    <td><input type="text" name="enavn" onchange="valider_enavn()" required></td>
                    <td><div id="feilEnavn">*</td>
        </tr>
                <tr>
                    <td><input type="submit" name="registrer" value="Registrer"></td>
        </tr>
            </table>
        </form>
    </body>
</html>

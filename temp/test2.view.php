<?php

namespace inews;

defined('3INEWS') or die('Acces interdit');

use F3il\Authentication;
use F3il\NavigationHelper;

$auth = Authentication::getInstance();

$user = $auth->getLoggedUser();
$id = $user['id'];
?>
<main>





    <div class="conteneur"> 
        <h1 class="titre">Edition de news</h1>
    </div>
    <div class="news">
        <?php
        if (!empty($_POST)) {

            if (isset($_POST['bouton2'])) {

                $image1 = $_POST['img'];
                $titre = $_POST['titre'];
                $couleurtxt = $_POST['couleurtxt'];
                $couleurbandeau = $_POST['couleurbandeau'];
                $positionbandeau = $_POST['positionbandeau'];
                $taillebandeau = $_POST['taillebandeau'];
                $tailletxt = $_POST['tailletxt'];
                $date = date("Y-m-d");

                if (empty($titre) OR empty($couleurtxt) OR empty($couleurbandeau) OR empty($positionbandeau) OR empty($tailletxt) OR empty($taillebandeau)) {
                    echo '<font color="red">un champ est vide!!</font>';
                }

// Aucun champ n'est vide, on peut enregistrer dans la table 
                else {
                    // connexion à la base
                    $db = mysql_connect('localhost', 'root', '') or die('Erreur de connexion ' . mysql_error());
// sélection de la base  

                    mysql_select_db('3inews', $db) or die('Erreur de selection ' . mysql_error());

                    // on écrit la requête sql 
                    $sql = "UPDATE news SET titre = '$titre', couleurTXT='$couleurtxt', couleurBand='$couleurbandeau', positionBand='$positionbandeau', tailleBand='$taillebandeau',tailleTXT='$tailletxt',dateModification='$date' WHERE image='$image1' and id='$id'";

                    // on insère les informations du formulaire dans la table 
                    mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());

                    // on affiche le résultat pour le visiteur 
                    $_SESSION["paratitre"] = $titre;
                    $_SESSION["paracouleurtxt"] = $couleurtxt;
                    $_SESSION["paracouleurband"] = $couleurbandeau;
                    $_SESSION["parapositionBand"] = $positionbandeau;
                    $_SESSION["paratailleBand"] = $taillebandeau;
                    $_SESSION["paratailleTXT"] = $tailletxt;
                    $imgaff = $_SESSION["img"];
                    $titreaff = $_SESSION["paratitre"];
                    $couleurtxtaff = $_SESSION["paracouleurtxt"];
                    $couleurbandaff = $_SESSION["paracouleurband"];
                    $positionbandaff = $_SESSION["parapositionBand"];
                    $taillebandaff = $_SESSION["paratailleBand"];
                    $tailleTXTaff = $_SESSION["paratailleTXT"];

                    mysql_close();
                }
            }
            if (isset($_POST['bouton3'])) {
                $_SESSION["paratitre"] = '';
                $_SESSION["paracouleurtxt"] = '';
                $_SESSION["paracouleurband"] = '';
                $_SESSION["parapositionBand"] = '';
                $_SESSION["paratailleBand"] = '';
                $_SESSION["paratailleTXT"] = '';
            }





            if (isset($_POST['bouton1'])) {
                
            }


            if (isset($_POST['image'])) {
                $test2 = $_POST['image'];






// On vérifie si les champs sont vides 
                if (empty($test2)) {
                    echo '<font color="red">champ vide!!</font>';
                }

// Aucun champ n'est vide, on peut enregistrer dans la table 
                else {
                    // connexion à la base
                    $db = mysql_connect('localhost', 'root', '') or die('Erreur de connexion ' . mysql_error());
// sélection de la base  

                    mysql_select_db('3inews', $db) or die('Erreur de selection ' . mysql_error());

                    // on écrit la requête sql 
                    $sql = "INSERT INTO news(titre,image,couleurTXT,couleurBand,positionBand,tailleBand,tailleTXT,diffusion,dateModification,tempdiff,id) VALUES('','$test2','','','','','','','','','$id')";

                    // on insère les informations du formulaire dans la table 
                    mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());

                    // on affiche le résultat pour le visiteur 


                    mysql_close();  // on ferme la connexion 
                    header("Refresh:0");
                }
            }
        }
        ?>

        <form action="?controller=utilisateur&action=editerimg" method="post" class="">

            <div> 

                <input type="submit" name="bouton2" value="Enregistrer" class="btn btn-lg btn-primary bouton boutongauche"/>
                <input type="submit" name="bouton3" value="annuler"  class="btn btn-secondary btn-lg bouton boutongauche"/>

                <div class="espace">

                </div>




            </div>
            <div class="bloc-information">
                <div class="bloc-image">
                    <div class="image">
<?php
if (!empty($_POST)) {

    if (isset($_POST['bouton4'])) {

        echo '<img type="image" class="image" src=images/' . $_POST['bouton4'] . ' alt="" name="" /> ';
        $img = $_POST['bouton4'];
        $_SESSION["img"] = $img;
        $imgaff = $img;



        $db = mysql_connect('localhost', 'root', '') or die('Erreur de connexion ' . mysql_error());
// sélection de la base  

        mysql_select_db('3inews', $db) or die('Erreur de selection ' . mysql_error());

        // on écrit la requête sql 
        $sql = "select titre from news where image='$img' and id='$id'";

        // on insère les informations du formulaire dans la table 
        $result = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
        $paratitre = mysql_result($result, 0);

        $_SESSION["paratitre"] = $paratitre;

        $sql = "select couleurTXT from news where image='$img' and id='$id'";

        // on insère les informations du formulaire dans la table 
        $result = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
        $paracouleurtxt = mysql_result($result, 0);

        $_SESSION["paracouleurtxt"] = $paracouleurtxt;

        $sql = "select couleurBand from news where image='$img' and id='$id'";

        // on insère les informations du formulaire dans la table 
        $result = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
        $paracouleurband = mysql_result($result, 0);
        $_SESSION["paracouleurband"] = $paracouleurband;

        $sql = "select positionBand from news where image='$img' and id='$id'";

        // on insère les informations du formulaire dans la table 
        $result = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
        $parapositionBand = mysql_result($result, 0);
        $_SESSION["parapositionBand"] = $parapositionBand;
        $sql = "select tailleBand from news where image='$img' and id='$id'";

        // on insère les informations du formulaire dans la table 
        $result = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
        $paratailleBand = mysql_result($result, 0);
        $_SESSION["paratailleBand"] = $paratailleBand;
        $sql = "select tailleTXT from news where image='$img' and id='$id'";

        // on insère les informations du formulaire dans la table 
        $result = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
        $paratailleTXT = mysql_result($result, 0);
        $_SESSION["paratailleTXT"] = $paratailleTXT;

        // on affiche le résultat pour le visiteur 

        $titreaff = $_SESSION["paratitre"];
        $couleurtxtaff = $_SESSION["paracouleurtxt"];
        $couleurbandaff = $_SESSION["paracouleurband"];
        $positionbandaff = $_SESSION["parapositionBand"];
        $taillebandaff = $_SESSION["paratailleBand"];
        $tailleTXTaff = $_SESSION["paratailleTXT"];

        mysql_close();  // on ferme la connexion 
    } else {
        if ($_SESSION["img"] == '') {
            $_SESSION["paratitre"] = '';
            $_SESSION["paracouleurtxt"] = '';
            $_SESSION["paracouleurband"] = '';
            $_SESSION["parapositionBand"] = '';
            $_SESSION["paratailleBand"] = '';
            $_SESSION["paratailleTXT"] = '';
        } else {
            echo '<img type="image" class="image" src=images/' . $_SESSION["img"] . ' alt="" name="" /> ';
        }
    }
} else {
    $_SESSION["img"] = '';
    $_SESSION["paratitre"] = '';
    $_SESSION["paracouleurtxt"] = '';
    $_SESSION["paracouleurband"] = '';
    $_SESSION["parapositionBand"] = '';
    $_SESSION["paratailleBand"] = '';
    $_SESSION["paratailleTXT"] = '';
}
?>

                        <input class=" form-control titreimg hidden"  name="img" value="<?php echo $_SESSION["img"]; ?>" >

                    </div>
                    <div  class="centre  form-group">
                        <label class="txt control-label col-sm-2">Texte :</label>

                        <div class="col-sm-6"> 
                            <input class=" form-control titreimg "  name="titre" value="<?php echo $_SESSION["paratitre"]; ?>" >
                        </div>   
                    </div>
                </div>
                <div class="bloc-paramettre">
                    <div class="test"> <h2 class="parametre">Parametres</h2></div>

                    <div class="form-horizontal ">





                        <div class="form-group ecart">
                            <label class="col-sm-2 control-label">Couleur texte:</label>
                            <div class="col-sm-10 form-inline">
                                <input class="form-control"  type="text"  value="<?php echo $_SESSION["paracouleurtxt"]; ?>" name="couleurtxt"  id="colorColor">

                                <select id="colorselector"  value="<?php echo $_SESSION["paracouleurtxt"]; ?>">
                                    <option value="#A0522D" data-color="#A0522D">sienna</option>
                                    <option value="#CD5C5C" data-color="#CD5C5C">indianred</option>
                                    <option value="#FF4500" data-color="#FF4500">orangered</option>
                                    <option value="#008B8B" data-color="#008B8B">darkcyan</option>
                                    <option value="18" data-color="#B8860B">darkgoldenrod</option>
                                    <option value="#B8860B" data-color="#32CD32">limegreen</option>
                                    <option value="#FFD700" data-color="#FFD700">gold</option>
                                    <option value="#48D1CC" data-color="#48D1CC">mediumturquoise</option>
                                    <option value="#87CEEB" data-color="#87CEEB">skyblue</option>
                                    <option value="#FF69B4" data-color="#FF69B4">hotpink</option>
                                    <option value="#CD5C5C" data-color="#CD5C5C">indianred</option>
                                    <option value="#87CEFA" data-color="#87CEFA">lightskyblue</option>
                                    <option value="#6495ED" data-color="#6495ED">cornflowerblue</option>
                                    <option value="#DC143C" data-color="#DC143C">crimson</option>
                                    <option value="#FF8C00" data-color="#FF8C00">darkorange</option>
                                    <option value="#C71585" data-color="#C71585">mediumvioletred</option>
                                    <option value="#000000" data-color="#000000">black</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group ecart">
                            <label  class="col-sm-2 control-label">Couleur bandeau:</label>
                            <div class="col-sm-10 form-inline">
                                <input class="form-control"  type="text"  value="<?php echo $_SESSION["paracouleurband"]; ?>"  name="couleurbandeau" id="colorColor2">
                                <select id="colorselector2"  >
                                    <option value="#A0522D" data-color="#A0522D">sienna</option>
                                    <option value="#CD5C5C" data-color="#CD5C5C">indianred</option>
                                    <option value="#FF4500" data-color="#FF4500">orangered</option>
                                    <option value="#008B8B" data-color="#008B8B">darkcyan</option>
                                    <option value="18" data-color="#B8860B">darkgoldenrod</option>
                                    <option value="#B8860B" data-color="#32CD32">limegreen</option>
                                    <option value="#FFD700" data-color="#FFD700">gold</option>
                                    <option value="#48D1CC" data-color="#48D1CC">mediumturquoise</option>
                                    <option value="#87CEEB" data-color="#87CEEB">skyblue</option>
                                    <option value="#FF69B4" data-color="#FF69B4">hotpink</option>
                                    <option value="#CD5C5C" data-color="#CD5C5C">indianred</option>
                                    <option value="#87CEFA" data-color="#87CEFA">lightskyblue</option>
                                    <option value="#6495ED" data-color="#6495ED">cornflowerblue</option>
                                    <option value="#DC143C" data-color="#DC143C">crimson</option>
                                    <option value="#FF8C00" data-color="#FF8C00">darkorange</option>
                                    <option value="#C71585" data-color="#C71585">mediumvioletred</option>
                                    <option value="#000000" data-color="#000000" selected="">black</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group ecart">
                            <label  class="col-sm-2 control-label">Position bandeau:</label>
                            <div class="col-sm-10">
                                <select  class="form-control" value="<?php $_SESSION["parapositionBand"]; ?>" name="positionbandeau">
                                    <option>Gauche</option>
                                    <option>Droite</option>
                                    <option>Haut</option>
                                    <option>Bas</option>
                                    <option>Centre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ecart">
                            <label  class="col-sm-2 control-label">Taille bandeau:</label>
                            <div class="col-sm-2">
                                <input class="form-control"  type="text" value="<?php echo $_SESSION["paratailleBand"]; ?>" name="taillebandeau">
                            </div>
                            <label  class="col-sm-1 control-label">%</label>
                        </div>
                        <div class="form-group ecart">
                            <label  class="col-sm-2 control-label">Taille texte:</label>
                            <div class="col-sm-2">
                                <input class="form-control"  type="text" value="<?php echo $_SESSION["paratailleTXT"]; ?>" name="tailletxt" >
                            </div>
                            <label  class="col-sm-1 control-label">px</label>
                        </div>


                    </div>

                </div>
            </div>
           <!-- <p><input type="text" name="champ" /></p>-->

        </form>

    </div>


</main>
<footer>
    <div class="footer">
        <div >
            <script language="javascript">

                function adresse() {
                    $test = document.getElementById("chemin1").value;
                    document.getElementById("image").value = $test.replace("C:\\fakepath\\", "");
                    $test2 = document.getElementById("image").value;
                }
                ;


            </script>

            <button class="btn btn-secondary btn-lg boutongauche  " ><label for="chemin1" class="input-file-trigger upload" tabindex="0">Select a file...</label></button>
            <input type="file" id="chemin1" onchange="adresse();" class="hidden"  />
            <form id="ajoutimg-form" method="POST" action="?controller=utilisateur&action=editerimg" >
                <input  id="image" name="image" class="hidden">
                <input type="submit" id="image" value="Envoyer" name="envoyer">
            </form>

        </div>
        <form  method="POST" action="?controller=utilisateur&action=editerimg">
            <div class="couleur form-inline">
                <table class="" >



                    <tr class="table-img"> 
<?php
foreach ($this->var as $var) {
    if ($var['id'] == $id) {
        ?>
                                <td class="table-img">
                                    <a href="#">

        <?php echo '<input type="image" class="image-secondaire" src=images/' . $var['image'] . ' alt="" name="bouton4" value="' . $var['image'] . '" /> ' ?>
                                    </a>
                                </td>
                                <td class="ecart-tabl"><a><?php $user['image'] ?> &nbsp;&nbsp;&nbsp;</a> </td>
        <?php
    }
}
?>
                    </tr>
                </table>
            </div>
        </form>

    </div>
    <div class="">
        <input type="submit" name="" value="tester"  class="btn btn-secondary btn-lg bouton boutontest" data-toggle="modal" data-target="#tallModal"/>



        <div id="tallModal" class="modal modal-wide fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="newsaff" style="position: relative;">

<?php echo '<img type="image" class="imgaff" src=images/' . $imgaff . ' alt="" name="" /> ';
;
?>
                        <div class="" style="font-size: 240px; position: absolute; background-color:<?php echo $couleurbandaff ?> ;opacity: 0.5; 

<?php
if ($positionbandaff == 'Haut') {
    ?>
                                 top:0%;width: 100%; height: <?php echo $taillebandaff; ?>%;
    <?php
}
if ($positionbandaff == 'Gauche') {
    ?>
                                 top:0%; left:0%;height: 100%; width: <?php echo $taillebandaff; ?>%; 
                            <?php
                        }

                        if ($positionbandaff == 'Droite') {

                            $droite = 100 - $taillebandaff;
                            ?>
                                 top:0%;  left:<?php echo $droite; ?>%;height: 100%; width: <?php echo $taillebandaff; ?>%; 
                                 <?php
                             }
                             if ($positionbandaff == 'Bas') {
                                 ?>
                                 bottom:0%;width: 100%; height: <?php echo $taillebandaff; ?>%;
                                 <?php
                             }
                             if ($positionbandaff == 'Centre') {
                                 ?>
                                 bottom:50%;width: 100%; height: <?php echo $taillebandaff; ?>%;
                                 <?php
                             }
                             ?>
                             ">

                            <p style="color: <?php echo $couleurtxtaff ?>; font-size: <?php echo $tailleTXTaff; ?>px; text-align: center;">
                             <?php
                             echo $titreaff;
                             ?> 
                            </p>

                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</footer>
<script>
    $(".modal-wide").on("show.bs.modal", function () {
        var height = $(window).height() - 200;
        $(this).find(".modal-body").css("max-height", height);
    });
    $('#colorselector').colorselector({
        callback: function (value, color, title) {
            $("#colorValue").val(value);
            $("#colorColor").val(color);
            $("#colorTitle").val(title);

        }
    });


</script>
<script>
    $('#colorselector2').colorselector({
        callback: function (value, color, title) {
            $("#colorValue").val(value);
            $("#colorTitle").val(title);
            $("#colorColor2").val(color);
        }
    });

</script>
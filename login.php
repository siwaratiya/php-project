<?php
session_start();
ini_set("display_errors",0);error_reporting(0);
$cn=mysql_connect("localhost","root");
mysql_select_db("mariem",$cn);
if(!(isset($_SESSION['id']))){
if(isset($_POST['log'])){ 
$req="select * from condidats where ((email='".$_POST['mail']."')and(pwd='".$_POST['pwd']."'))";
mysql_query($req);
$res=mysql_query($req,$cn);
if($res){
    while($row=mysql_fetch_array($res))
    {
        $_SESSION['id']=$row[0];
        echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    }
}
else {
    echo '<body onLoad="alert(\'Login or password invalid\')">';
    echo '<meta http-equiv="refresh" content="0;URL=login.php">';
}
}
}
if(isset($_POST['ajout'])){
$req="select count(*) from questions";
mysql_query($req);
$res=mysql_query($req,$cn);
while($row=mysql_fetch_array($res))
    {
        $num=$row[0];
    }
for ($i=1; $i<=$num; $i++) {
    $req="INSERT INTO `reponse`(`id_ques`, `cin`, `reponse`) VALUES ('".$i."','".$_SESSION['id']."','".$_POST[$i]."')";
    mysql_query($req);
}
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="inscription.css"/>
        <link rel="stylesheet" type="text/css" href="acceuil.css"/>
        <title> Login </title>
    </head>
    <body>
        
            <div id="bloc-page">
                <header>
                <div id="image principale">
                    <a href ="inscription.html"><img src="image/photo.jpg" id="imag1"/></a>
                </div>
            </div>
            <nav> 
                <ul> 
                    <li><a href="index.html"> acceuil </a></li>
                    <li><a href="qui somme-nous.html"> qui somme-nous</a></li>
                    <li><a href="referance.htm"> referance</a></li>
                    <li><a href="contacter.htm"> contacter </a></li>
                    <li><a href="inscription.htm"> inscription </a></li>
                    <?php
                    if(isset($_SESSION['id'])){
                        echo '<li><a href="logout.php"> Deconnexion </a></li>';
                    }
                    else 
                        echo '<li><a href="login.php"> Connexion </a></li>';
                    ?>
                </ul>
            </nav>
        </header>
        <?php
        if(!(isset($_SESSION['id']))){
        ?>
    <center><font color="black" size="10" face="area">Connexion:</font></center><BR><BR>
    <form method="post" action="login.php">
    <FIELDSET id="main">
        <LEGEND></LEGEND>
        <label><font size="4" color="black">E-Mail : </font></label>
        <INPUT name="mail" type="text" tabindex="1"><br><br>
        <label><font size="4" color="black">Mot de passe : </font></label>
        <INPUT name="pwd" type="password" tabindex="2"><br><br>
        <input type="submit" value="valider" name="log"><input type="reset" value="annuler">
    </FIELDSET>
        </form>
        <?php
        }
        ?>
        <?php
        if(isset($_SESSION['id'])){
        ?>
    <center><font color="black" size="10" face="area">Entretient:</font></center><BR><BR>
    <form method="post" action="login.php">
    <FIELDSET id="main">
        <LEGEND></LEGEND>
        <?php
        $req="SELECT * FROM `questions`";
        mysql_query($req);
        $res=mysql_query($req,$cn);
        while($row=mysql_fetch_array($res)){
            ?>
           <label><font size="4" color="black"><?php echo $row[1]; ?></font></label>
           <INPUT name="<?php echo $row[0]; ?>" type="text" tabindex="1"><br><br>
           <?php
        }
        ?>
        <input type="submit" value="valider" name="ajout"><input type="reset" value="annuler">
    </FIELDSET>
        </form>
        <?php
        }
        ?>
</body>
</html >
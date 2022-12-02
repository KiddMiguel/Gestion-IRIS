<h1>Mon profil</h1>
<h4>Nom : <?= $_SESSION ['nom'] ?> </h4>
<h4>Prenom : <?= $_SESSION ['prenom'] ?> </h4>
<h4>Email : <?= $_SESSION ['email'] ?></h4>
<h4>Role : <?= $_SESSION ['role'] ?></h4>

<form action="" method="post" enctype="multipart/form">
    <h5>New ùpt de passe</h5>
    <input type="password" name="mdp" id=""><br>
    <input type="submit" value="New mot de passe" name="ChangeMdp">
</form>
<?php
    if(isset($_POST['ChangeMdp']))
    {
        $mdp = $_POST['mdp'];
        // hachage du mdp 
        $unControleur ->setTable("grainSel");
			$result = $unControleur -> selectAll();
			$nb = $result[0]['nb'];
			$mdph = $mdp.$nb ;
			$mdph = sha1($mdp);
           
            $unControleur->setTable ("historique");
            $unResult = $unControleur->selectWhere("mdp", $mdph);
           
            if($unResult ==null){
                echo "<br> Modif good";
                $unControleur->setTable ("user");
                $dt = date("Y-m-d");
                $tab = array("nom"=>$_SESSION['nom'], "prenom"=>$_SESSION['prenom'], "email"=>$_SESSION['email'],"mdp"=>$mdp, "role"=>$_SESSION['role'], "datemdp" => $dt, "actif"=>"1");
                $unControleur->update ($tab, "iduser", $_SESSION['iduser']);

            }else{
                echo "<br> You need a new password";
            }
        
    }




?>

<?php
   if (isset($_POST['email'])){
        $destinataire = 'clara.vesval@ynov.com';
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
        $expediteur = $_POST['email'];
        $objet = $_POST['objet'];
        
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
        $headers .= 'To: '.$destinataire."\n"; // Mail de reponse
        $headers .= 'From:'.$expediteur.'>'."\n"; // Expediteur
        
        $message =  '<div style="width: 100%; text-align: center; font-weight: bold"> Bonjour je suis '.$_POST['nom'].$_POST['prenom'].'!<br>
                        '.$_POST['message'].'</div>';
        
        if(imap_mail($destinataire, $objet, $message, $headers))
        {
            echo '<script languag="javascript" >alert("Votre message a bien été envoyé ");</script>';
            echo "";
        }
        else // Non envoyé
        {
            echo '<script languag="javascript">alert("Votre message n\'a pas pu être envoyé");</script>';
        }

}
?>
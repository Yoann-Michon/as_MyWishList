<?php

function descript(){
    echo "<h1>Nouvelle Liste</h1>
<form method='POST'>
    <label for='text'> Titre : </label>
    <input type='text' id='nliste' placeholder='Nom de la liste'/><br/><br/>
            
    <label for='message'> Description : </label><br/><br/>
    <textarea rows='8' cols='45' placeholder='Veuillez entrer une description'></textarea><br/><br/>
            
    <label for='date'> Date d'expiration : </label>
    <input type='date'/><br/><br/>
            
    <label for='radio'> Cette liste est : </label>
    <input type='radio' name='option' value='Prive'>Privé
    <input type='radio' name='option' value='Publique' checked/>Publique<br/><br/>
</form>";
}

function items(){
    echo"<h2>Selections des Items</h2>
            
<form enctype='multipart/form-data' method='POST'>
    <input type='hidden' name='MAX_FILE_SIZE' value='250000' />
    <input type='file' name='fichier' size=50 />
    
    <input type='submit' value='Supprimer' /><br/><br/>";

    if(isset($_POST['ajouter'])){
        echo"<input type='file' name='fichier' size=50 />
            <input type='submit' value='Supprimer' /><br/><br/>";
    }
    echo"<input type='submit' name='ajouter' value='Ajouter' /><br/><br/>
</form>";
}

function gestionPage(){
    echo "
<form>
    <input type='button' value='Page précédente' onclick='history.back()'>
    <input type='submit' value='Valider'>
</form>";
}






descript();
items();
gestionPage();

<?php


namespace td2\vue;

class VueParticipant
{
    private $data;
    private $container;

    public function __construct(array $data, $c)
    {
        $this->data = $data;
        $this->container = $c;
    }

    public function question1() {
        $l = $this->data[0];
        if(is_null($l))
        {
            return "<h2>Liste Inexistante</h2>";
        }
        return json_encode($l, JSON_PRETTY_PRINT);
    }

    public function question2(){
        $l = $this->data[0];
        if(is_null($l))
        {
            return "<h2>Liste Inexistante</h2>";
        }
        return json_encode($l, JSON_PRETTY_PRINT);
    }

    public function question7($id){
        $action = $this->container->router->pathFor('valider', ["id"=>$id]);

        $retour = "<h2>Ajouter un commentaire</h2>";
        $retour .= <<<END
<form action="$action" method="post">
        <label for="email">Email de l'utilisateur : </label><br>
        <input type="text" id="email" name="email"><br>
        <label for="titre">Titre : </label><br>
        <input type="text" id="titre" name="titre"><br>
        <label for="commentaire">Contenu du commentaire : </label><br>
        <input type="text" id="commentaire" name="commentaire"><br>
        <button type="submit">Envoyer</button>
</form><br/>
END;
        return $retour;
    }
}


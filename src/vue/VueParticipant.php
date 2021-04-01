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
        return $l->toJson();
    }

    public function question2(){
        $l = $this->data[0];
        if(is_null($l))
        {
            return "<h2>Liste Inexistante</h2>";
        }
        return $l->toJson();
    }

    public function question3(){
        $l = $this->data[0];
        if(is_null($l))
        {
            return "<h2>Liste Inexistante</h2>";
        }
        return $l->toJson();
    }

}


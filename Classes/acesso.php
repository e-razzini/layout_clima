<?php

class acesso{

    public function novoAcesso(){
     $acesso = file_get_contents("./cache/acesso.txt");
     $acesso++;
      file_put_contents("./cache/acesso.txt",$acessos);
    }
     public function getAcesso (){
         return $acesso = file_get_contents("./cache/acesso.txt");

     }

}




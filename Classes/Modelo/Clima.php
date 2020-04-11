<?php
namespace Classes\Modelo;
date_default_timezone_set('America/Sao_paulo');
use DateTime;

class Clima
{

    public $temperatura;
    public $velocidade;
    public $amanhecer;
    public $porDoSol;
    public $humidade;
    public $pressao;
    public $descricao;
    public $icon;
    public $cidade;
    public $codCidade;
    public $data;
    
//kelvin out celsius
    public function getTemperaturaCelsius(): float
    {

        $calculo = $this->temperatura - 273.15;
        return $calculo;
    }

//kelvin out fahrenheit
    public function getTemperaturaFahrenheit(): float
    {

        $calculo = (($this->temperatura - 273.15) * 1.8) + 32;
        return $calculo;
    }

    public function getAmanhecer()
    {
        $calculo = date("H:i", $this->amanhecer);
        return $calculo;
    }
    public function getPorDoSol()
    {
        $calculo = date("H:i", $this->porDoSol);
        return $calculo;
    }
    public function getData()
    {
        $this->data =Date("d/m/Y");
        return $this->data;
    }
    public function getMilhas(){
         $calculo =$this->velocidade * 0.6214;
        return $calculo;
    }
     
}

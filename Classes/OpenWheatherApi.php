<?php

require 'vendor/autoload.php';
require 'Modelo/Clima.php';
require 'acesso.php';
use Classes\Modelo\Clima;
use GuzzleHttp\Client;

class OpenWheatherApi
{

    private $url;
    private $id;
    private $appid;

    public function __construct()
    {
        //Inicializa as variáveis globais
        $this->url = "http://api.openweathermap.org/data/2.5/weather";
        $this->id = "3468879";
        $this->appid = "3af5f0dc0b125a773f61ff688a6c14e1";
    }

    /**
     * Vai no site openweathermap.org e captura informações de clima
     */
    private function getDataWheather(): object
    {
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $urlCompleta = $this->url . "?id=" . $this->id . "&appid=" . $this->appid;

        $request = $client->request('GET', $urlCompleta);

        $clima = $request->getBody();

        //Converter para objeto
        $objClima = json_decode($clima);
        //salva os dados e codifica os dados em uma string
        $objSerializado = serialize($objClima);
        $caminho = "./cache/clima.txt";
        //grava no disco
        file_put_contents($caminho, $objSerializado);
        return $objClima;
    }

    public function getClima(): Clima
    {
        $acesso = new acesso();
        $acesso->novoAcesso();

        //  $objGenerico = $this->getDataWheather();
        $conteudoAtualizado = file_get_contents("./cache/controle_cache.txt");

        $arrayAtualizacao = explode("#", $conteudoAtualizado);
        $dataAtualizacao = $arrayAtualizacao[0];
        $dataAtual = time();

        if ($dataAtual - $dataAtualizacao >= 300) {

            //atualiza dos dados
            $objGenerico = $this->getDataWheather();
            $arrayAtualizacao[0] = time();            
            $conteudoArquivo = file_get_contents("./cache/clima.txt");
            $objGenerico = unserialize($conteudoArquivo);
            $dadosArquivo = $arrayAtualizacao[0] . "#" . $dataAtualizacao[1];
            file_put_contents("./cache/controle_cache.txt", $dadosArquivo);

        } else {
            //os dados do disco
            $conteudoArquivo = file_get_contents("./cache/clima.txt");
            //deserealiza os dados
            $objGenerico = unserialize($conteudoArquivo);
        }
        $cli = new Clima();

        $cli->temperatura = $objGenerico->main->temp;
        $cli->codCidade = $objGenerico->id;
        $cli->cidade = $objGenerico->name;
        $cli->velocidade = $objGenerico->wind->speed;
        $cli->amanhecer = $objGenerico->sys->sunrise;
        $cli->porDoSol = $objGenerico->sys->sunset;
        $cli->humidade = $objGenerico->main->humidity;
        $cli->pressao = $objGenerico->main->pressure;
        $cli->descricao = $objGenerico->weather[0]->description;
        $cli->icon = $objGenerico->weather[0]->icon;
        $cli->acessos = $acesso->getAcesso();

        return $cli;
    }

}

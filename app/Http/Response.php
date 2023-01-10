<?php

namespace App\Http;

class Response
{

    /**
     * Código do Status HTTP
     * @var int
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que esta sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * Método contrutor
     * @param int $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode    = $httpCode;
        $this->content     = $content;
        $this->setContentType($contentType);
        
    }

    /**
     * Método responsável por alterar o cont type do response
     * @param string $contentType
     */
    public function setContentType($contentType){
        $this->contentType  = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho do response
     * @param string $key
     * @param string $value
     */
    public function addHeader($key,$value){
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os headers parar o navegador
     */
    private function sendHeaders(){
        // DEFINE O COD STATUS DE RETORNO
        http_response_code($this->httpCode);

        // ENVIAR HEADERS
        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }

    }

    /**
     * Método respnsãvel por enviar a resposta para o osuário
     */
    public function sendResponse(){
        // ENVIA OS HEADERS
        $this->sendHeaders();

        // DEFINE O CONTEÚDO
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }

}

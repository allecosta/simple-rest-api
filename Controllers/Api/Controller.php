<?php

class Controller 
{
    /**
     * Invocando o método mágico __call()
     *
     * @param [string] $name
     * @param [string] $args
     * @return void
     */
    public function __call($name, $args) 
    {
        $this->sendOutPut('' ['HTTP/1.1 404 NOT FOUND']);
    }

    /**
     * Envia a saída da API
     *
     * @param [mixed] $data
     * @param array $httpHeaders
     * @return void
     */
    protected function sendOutPut($data, $httpHeaders = []) 
    {
        header_remove(('Set-Cookie'));

        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }

        echo $data;
        exit;
    }

    /**
     * Obtém os elementos da URI
     *
     * @return array
     */
    protected function getUriSegments() 
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);

        return $uri;
    }

    /**
     * Obtém os parâmetros da query string
     *
     * @return array
     */
    protected function getQueryStringParams() 
    {
        return parse_str($_SERVER['QUERY_STRING'], $SqlQuery);
    }
   
}
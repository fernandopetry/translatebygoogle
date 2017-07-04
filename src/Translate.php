<?php

namespace Petry\Translate;


use GuzzleHttp\Client;
use Petry\Translate\Locale\iLocale;

class Translate
{
    /**
     * @var iLocale
     */
    private $localeSource;
    /**
     * @var iLocale
     */
    private $localeDestination;
    /**
     * @var string
     */
    private $stringSource;
    /**
     * @var string
     */
    private $stringDestination;


    /**
     * Translate constructor.
     * @param string $string Texto a ser traduzido
     * @param iLocale $ruleSource Linguagem de origem
     * @param iLocale $ruleDestination Linguagem de destino
     */
    public function __construct($string,iLocale $ruleSource, iLocale $ruleDestination)
    {
        $this->stringSource = $string;
        $this->localeSource = $ruleSource->getLocale();
        $this->localeDestination = $ruleDestination->getLocale();
    }


    /**
     * Url de consulta ao Google API
     * @return string
     */
    private function getUrl()
    {
        return "https://translate.googleapis.com/translate_a/single?client=gtx&sl={$this->localeSource}&tl={$this->localeDestination}&dt=t&q={$this->stringSource}";
    }


    /**
     * Texto traduzido
     * @return mixed
     */
    public function getTranslate()
    {
        $url = $this->getUrl();

        $client = new Client();
        $res    = $client->request('GET', $url);
        $array  = json_decode($res->getBody());
        $return = $array[0][0][0];
        $return = str_replace(" ​​", " ", $return);
        return $return;
    }

}
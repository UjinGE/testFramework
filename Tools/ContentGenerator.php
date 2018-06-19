<?php

class ContentGenerator{
    private $count;
    private $titles;
    private $descriptions;

    public function __construct(int $count)
    {
        $this->count = $count;
        $this->titles = $this->getTitlesFromApi();
        $this->descriptions = $this->getDescriptionsFromApi();
    }

    private function getTitlesFromApi(){
        return json_decode(file_get_contents('http://names.drycodes.com/' . $this->count . '?separator=space'));
    }

    private function getDescriptionsFromApi(){
        return json_decode(file_get_contents('https://baconipsum.com/api/?type=all-meat&paras=' . $this->count));
    }

    public function getRandomTitle(){
        try{
            return $this->getRandomElement($this->titles);
        }catch (Exception $e){
            throw new Exception('No more titles');
        }
    }

    public function getRandomDescription(){
        try{
            return array_pop($this->descriptions);
        }catch (Exception $e){
            throw new Exception('No more descriptions');
        }
    }

    private function getRandomElement(&$array){
        if (count($array) === 0 ){
            throw new Exception('No more elements');
        }
        return array_pop($array);
    }

    public function generateUuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
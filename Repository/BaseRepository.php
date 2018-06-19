<?php

namespace Repository;

use Repository\DataSource\SourceInterface;

class BaseRepository{

    protected $source;

    public function __construct(SourceInterface $source = null)
    {
        if ($source !== null){
            $this->setSource($source);
        }
    }

    public function setSource(SourceInterface $source){
        $this->source = $source;
    }

}
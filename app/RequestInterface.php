<?php

namespace app;

interface RequestInterface{
    public function getUri();
    public function getMethod();
}
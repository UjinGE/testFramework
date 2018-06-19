<?php

namespace Repository\DataSource;

interface ProductSourceInterface extends SourceInterface
{
    public function findByUuid(string $uuid);

    public function findList();


}
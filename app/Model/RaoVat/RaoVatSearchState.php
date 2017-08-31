<?php

namespace App\Model\RaoVat;


class RaoVatSearchState {
    private $manufacturer,$type,$city,$min,$max,$page;
    public function __construct($filterManufacturer,$filterType,$filterCity,$filterMin,$filterMax,$page) {
        $this->manufacturer = $filterManufacturer;
        $this->type = $filterType;
        $this->city = $filterCity;
        $this->min = $filterMin;
        $this->max = $filterMax;
        $this->page = $page;
    }
    public function getManufacturer()
    {
       return $this->manufaturer;
    }
    public function getType()
    {
        return $this->type;
    }
}
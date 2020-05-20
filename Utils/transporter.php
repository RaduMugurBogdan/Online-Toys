<?php

class Transporter
{
    public $data;
    public $msg;
    
    public function __construct($data,$msg)
    {
        $this->data = $data;
        $this->msg = $msg;
    }
}

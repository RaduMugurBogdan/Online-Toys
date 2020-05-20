<?php

class Message
{
    public $type;
    public $text;
    public $coderr;
    
    function __construct() {
        $type = " ";
        $text = " ";
        $coderr = 0;
    }
    
    function SuccesMessage($text,$coderr)
    {
        $this->type = "Succes";
        $this->text = $text;
        $this->coderr = $coderr;

    }
    
    function ErrorMessage($text,$coderr)
    {
        $this->type = "Error";
        $this->text = $text;
        $this->coderr = $coderr;

    }
    
    function WarningMessage($text,$coderr)
    {
        $this->type = "Warning";
        $this->text = $text;
        $this->coderr = $coderr;
     
    }
    
    function InfoMessage($text,$coderr)
    {
        $this->type = "Info";
        $this->text = $text;
        $this->coderr = $coderr;
    }
}


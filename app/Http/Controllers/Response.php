<?php

namespace App\Http\Controllers;

class Response
{
    protected $content;
    protected $status;

    public function __construct($content = '', $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function send()
    {
        http_response_code($this->status);
        echo $this->content;
    }
}

<?php

namespace App\Lib;

class Response {
    public $result = null;
    public $response = false;
    public $message = 'Ocurrio un error inesperado.';
    public $errors = [];
    public $code = null;
    public function SetResponse($response, $m = '', $c = '') {
        $this->response = $response;
        $this->message = $m;
        $this->code = $c;
        if (!$response && $m = '') {
            $this->response = 'Ocurrio un error inesperado';
        }
        return $this;
    }
}

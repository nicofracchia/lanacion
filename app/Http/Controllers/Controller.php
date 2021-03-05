<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnError($error = '', $errorMessage = '', $params = []){
        $return = [
            'error' => $error,
            'errorMessage' => $errorMessage,
            'params' => $params
        ];
        return json_encode($return);
    }
}

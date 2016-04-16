<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifierController extends Controller
{
    protected function webhook(Request $request, $alias)
    {
        $build_type = $request->input('build_type');
        $name = $request->input('name');
        $status = $request->input('status');

        $client = new Client();
        $response = $client->request('GET', 'http://rest.yunba.io:8080', [
            'query' => [
                'method' => 'publish_to_alias',
                'appkey' => env('YUNBA_APPKEY', ''),
                'seckey' => env('YUNBA_SECRET_KEY', ''),
                'alias' => $alias,
                'msg' =>  $build_type . $name . $status
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            return $this->success();
        }
        return $this->failure();
    }
}

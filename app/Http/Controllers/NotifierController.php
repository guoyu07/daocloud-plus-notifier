<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Validator;
use Lang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifierController extends Controller
{
    protected function webhook(Request $request, $alias)
    {
        $name = $request->input('name');
        $build = $request->input('build');

        if (!$build) {
            return $this->failure();
        }

        $msg = Lang::get('daocloud.' . $build['build_type'] . '_' . strtolower($build['status']), ['name' => $name]);

        $client = new Client();
        $response = $client->request('GET', 'http://rest.yunba.io:8080', [
            'query' => [
                'method' => 'publish_to_alias',
                'appkey' => env('YUNBA_APPKEY', ''),
                'seckey' => env('YUNBA_SECRET_KEY', ''),
                'alias' => $alias,
                'msg' =>  $msg
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return $this->success();
        }

        return $this->failure();
    }
}

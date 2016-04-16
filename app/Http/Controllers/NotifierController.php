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

        // 根据 build_type 和 status 组装消息
        $msg = Lang::get('daocloud.' . $build['build_type'] . '_' . strtolower($build['status']), ['name' => $name]);

        // 向别名发送消息，通过 env 方法获取到云巴的 AppKey 和 SecretKey
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

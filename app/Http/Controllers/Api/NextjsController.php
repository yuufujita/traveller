<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NextjsController extends Controller
{
    public function index()
    {
        // ダミーデータの配列を作成
        $data = [
            ['id' => 1, 'name' => 'サンライズ出雲', 'description' => 'Description for サンライズ出雲'],
            ['id' => 2, 'name' => '奥出雲おろち', 'description' => 'Description for 奥出雲おろち'],
            ['id' => 3, 'name' => 'リゾートしらかみ', 'description' => 'Description for リゾートしらかみ'],
        ];

        // JSONレスポンスとしてデータを返す
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Scrape;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;

class ScrapeController extends Controller
{
    public function index()
    {
        //追加
        $response = Http::get('https://www.jalan.net/yad397057/kuchikomi/');

        //$html = mb_convert_encoding($response->body(), 'UTF-8', 'auto');
        $html = mb_convert_encoding($response->body(), 'HTML-ENTITIES', 'UTF-8');

        // UTF-8に変換したHTMLを出力
        print_r($html);

        // return view('scrapes.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // 追加
        return view('scrapes.show', compact('yadotext'));
    }

    /**
     * Scrape tweets from external source.
     */
    public function scrape(Request $request)
    {
        // スクレイピング対象のURL
        $url = "https://www.jalan.net/yad397057/kuchikomi/";

        // Guzzleクライアントのインスタンスを作成
        $client = new Client();
        $response = $client->get($url);
        
        // ステータスコードが200以外の場合は処理を中断
        if ($response->getStatusCode() != 200) {
            // エラー処理
            abort(500, 'Failed to fetch data from the URL');
        }
        
        // HTMLコンテンツを取得
        $content = $response->getBody()->getContents();
        
        // Symfony DomCrawlerを使用してHTMLを解析
        $crawler = new Crawler($content);
        
        // スクレイピングしたい要素を選択
        $yadotext = $crawler->filter('.yado_header_hotel')->text();

        // ビューにデータを渡す
        return view('scrapes.show', compact('yadotext'));
    }
}

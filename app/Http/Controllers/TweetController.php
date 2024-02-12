<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //追加
        $tweets = Tweet::with('user')->latest()->get();
        return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 追加
        return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 追加
        $request->validate([
            'tweet' => 'required|max:255',
        ]);
        $request->user()->tweets()->create($request->only('tweet'));
        return redirect()->route('tweets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        // 追加
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        // 追加
        return view('tweets.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        // 追加 
        $request->validate([
            'tweet' => 'required|max:255',
        ]);
        $tweet->update($request->only('tweet'));
        return redirect()->route('tweets.show', $tweet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        // 追加
        $tweet->delete();
        return redirect()->route('tweets.index');
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
        $yadotext = $crawler->filter('h2')->text();

        /*
        $reviews = $crawler->filter('.c-kuchikomi__item')->each(function ($node) {
            
            // 各レビューの情報を抽出
            $title = $node->filter('.c-kuchikomi__title')->text();
            $content = $node->filter('.c-kuchikomi__text')->text();
            
            // レビューの情報を配列として返す
            return [
                'title' => $title,
                'content' => $content,
            ];
        });
        */
        
        // ビューにデータを渡す
        // return view('tweets.create', ['reviews' => $reviews]);
        return view('tweets.create', compact('yadotext'));
    }
}
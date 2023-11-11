<?php
 
namespace App\Http\Controllers;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\Models\User;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
 
use Illuminate\Http\Request;
 
class LineMessengerController extends Controller
{
    // メッセージ送信用
    public function message() {
 
        // LINEBOTSDKの設定
        $http_client = new CurlHTTPClient(config('services.line.channel_token'));
        $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);
 
        // LINEユーザーID指定
        $userId = "LINEユーザーID";
 
        // メッセージ設定
        $message = "こんにちは！";

        // メッセージ送信
        $textMessageBuilder = new TextMessageBuilder($message);
        $response    = $bot->pushMessage($userId, $textMessageBuilder);

    }
}

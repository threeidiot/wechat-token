<?php

namespace App\Console\Commands;

use App\Helper\Log;
use App\Models\WechatToken;
use Illuminate\Console\Command;

class WeixinToken extends Command
{
    protected $signature = 'weixin_token';
    protected $description = 'weixin token';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $wechat_keys = config('common.wechat_keys');
        foreach ($wechat_keys as $wechat_key) {
            $app_id = $wechat_key['app_id'];
            $secret = $wechat_key['secret'];
            Log::info("run app_id : {$app_id}");
            $token = $this->_token($app_id, $secret);
            if (!$token) {
                Log::info('get token err', ['app_id' => $app_id]);
                continue;
            }
            $ticket = $this->_ticket($token);
            if (!$ticket) {
                Log::info('get ticket err', ['app_id' => $app_id, 'token' => $token]);
                continue;
            }
            WechatToken::add($wechat_key->app_id, $token, $ticket);
        }
    }

    private function _token($wx_app_id, $wx_app_secret)
    {
        $api_result_json = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$wx_app_id}&secret={$wx_app_secret}");
        \Log::info('get token result', [$api_result_json]);
        $api_result = json_decode($api_result_json);
        return $api_result->access_token ?? '';
    }

    private function _ticket($wx_access_token)
    {
        $api_result_json = file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$wx_access_token}&type=jsapi");
        $api_result = json_decode('get ticket result', [$api_result_json]);
        return $api_result->ticket ?? '';
    }
}

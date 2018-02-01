<?php

namespace App\Models;

/**
 * App\Models\WechatToken
 *
 * @property int $id
 * @property string $app_id
 * @property string $token
 * @property string $ticket
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WechatToken whereAppId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WechatToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WechatToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WechatToken whereTicket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WechatToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WechatToken whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WechatToken extends BaseModel
{
    public $table = 'wechat_token';

    public static function add($app_id, $token, $ticket)
    {
        $self = self::whereAppId($app_id)->first();
        if (!$self) {
            $self = new self;
            $self->app_id = $app_id;
        }
        $self->token = $token;
        $self->ticket = $ticket;
        $self->save();
        return $self;
    }
}

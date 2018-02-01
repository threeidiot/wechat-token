<?php

namespace App\Helper;


class Log extends BaseHelper
{
    public static function info(string $msg, array $info = []): void
    {
        echo "info {$msg} " . date('Y-m-d H:i:s') . "\n";
        if ($info) {
            print_r($info);
        }
    }
}

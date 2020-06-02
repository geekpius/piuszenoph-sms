<?php 



namespace ZenophSmsGh\Sms\Facades;

use Illuminate\Support\Facades\Facade;

class ZenophSMSGH extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zenophsmsgh-sms';
    }
}
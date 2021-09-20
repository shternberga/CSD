<?php

namespace App\Services\DelfiRSS;

use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Object_;

class DelfiService
{
    /**
     * Return one or more news items and then optionally save the model.
     *
     */
    public static function getNews(string $channel = 'delfi')
    {
        $response = Http::get('https://www.delfi.lv/rss/?channel=' . $channel);

        $responseXml = simplexml_load_string($response->body(), null
            , LIBXML_NOCDATA);
        if ($responseXml instanceof \SimpleXMLElement) {
            $channelXML = (object)$responseXml->channel;
            return $channelXML->item ?? null;
        }

        return null;
    }
}

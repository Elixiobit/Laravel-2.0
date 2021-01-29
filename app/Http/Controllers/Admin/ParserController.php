<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserController extends Controller
{
    public function index()
    {
        $xml = XmlParser::load('https://russian.rt.com/rss');
        $date = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_categories' => ['uses' => 'channel.description'],
            'source' => ['uses' => 'channel.link'],
            'items' => ['uses' => 'channel.item[title,description,pubDate]'],
        ]);

        foreach ($date['items'] as $oneNews) {
            (new News())->saveParserNews($oneNews);
        }

        return redirect()->route('news::categories');
    }

    public function currencyExchange()
    {
        static $rates;

        if ($rates === null) {
            $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
        }

//        echo "Обменный курс USD по ЦБ РФ на сегодня: {$rates->Valute->USD->Value}\n";
    }
}

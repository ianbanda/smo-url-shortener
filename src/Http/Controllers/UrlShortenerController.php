<?php
namespace Ian\UrlShortener\Http\Controllers;

use Illuminate\Http\Request;
use Ian\UrlShortener\Models\ShortUrl;
use Illuminate\Support\Str;

class UrlShortenerController extends \App\Http\Controllers\Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $shortUrl = Str::random(6);

        $shortUrl = ShortUrl::create([
            'original_url' => $request->url,
            'short_url' => $shortUrl
        ]);

        return response()->json([
            'short_url' => url("/s/{$shortUrl}")
        ]);
    }

    public function redirect($url)
    {
        $url = ShortUrl::where('short_url', $url)->firstOrFail();
        return redirect($url->original_url);
    }
}

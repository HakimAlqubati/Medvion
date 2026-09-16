<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\SitemapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    /**
     * Return the XML sitemap response.
     */
    public function index(Request $request)
    {
        $filePath = public_path('sitemap.xml');

        if (File::exists($filePath)) {
            return Response::file($filePath, [
                'Content-Type' => 'text/xml',
                'Cache-Control' => 'public, max-age=3600',
            ]);
        }

        return SitemapService::build()->toResponse($request);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\AboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the About us page.
     *
     * @param AboutService $aboutService
     * @return \Illuminate\View\View
     */
    public function index(AboutService $aboutService)
    {
        $pageData = $aboutService->getPageContent();

        return view('about', $pageData);
    }
}

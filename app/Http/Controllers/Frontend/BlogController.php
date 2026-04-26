<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->getPaginatedBlogs(9);
        return view('blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = $this->blogService->getBlogBySlug($slug);
        return view('blog.show', compact('blog'));
    }
}

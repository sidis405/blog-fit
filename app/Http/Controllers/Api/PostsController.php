<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;

class PostsController extends Controller
{
    protected $repo;

    public function __construct(PostsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        return $this->repo->index($request);
    }
}

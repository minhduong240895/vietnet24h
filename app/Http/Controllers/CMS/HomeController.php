<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;

class HomeController extends Controller
{
    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @var BaseRepository
     */
    protected $response = null;

    public function __construct(Request $request, ResponseFactory $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function index(){
        return $this->response->view('homes.index');
    }
}

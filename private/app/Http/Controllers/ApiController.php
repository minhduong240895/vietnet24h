<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\HttpException;
/**
 * @SWG\Swagger(
 *     schemes={"http", "https"},
 *     basePath="/api/",
 *     @SWG\Info(
 *          title="Motel API",
 *          version="2.0"
 *     )
 * )
 */
class ApiController extends Controller
{
    use Helpers;
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Carbon
     */
    protected $since;
    /**
     * @var Container
     */
    protected $app;
    /**
     * ApiController constructor.
     *
     * @param Request $request
     * @param Container $app
     */
    public function __construct(Request $request, Container $app)
    {
        $this->since = false;
        $this->request = $request;
        $this->app = $app;
        $since = $request->header('IF-Modified-Since', false);
        if ($since) {
            $this->since = Carbon::parse($since);
        }
    }
}
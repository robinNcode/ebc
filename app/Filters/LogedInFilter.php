<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use SADO\Models\PermissionModel;

/**
 * Short description of this class usages
 *
 * @class LoggedInFilter
 * @generated_by CI-Recharge
 * @package App
 * @implements FilterInterface
 * @created_at 16 December, 2020 07:15:04 AM
 */
class LoggedInFilter implements FilterInterface
{
    protected $permission = null;


    /**
     * @param RequestInterface $request
     * @param null $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //verify url
        $url = uri_string();

        if ($url != '/' && $url != 'login'
            && $url != 'forgot-password' && $url != 'lock-screen') {

            if (empty(session('user_id'))) {
                return redirect()->to('/');
            }
        } else {
            if (!empty(session('user_id'))) {
                return redirect()->to('/dashboard');
            }
        }

    }

    //--------------------------------------------------------------------

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param null $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

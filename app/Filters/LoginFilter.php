<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    /**
     * @param RequestInterface $request
     * @param null $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //Validator Instants
        $validator = Services::validation();

        if ($request->getMethod() == 'post') {

            $validator->setRules([
                'user_name' => [
                    'label' => 'User Name',
                    'rules' => 'required|trim|string|max_length[40]|min_length[3]'
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|trim|string|max_length[30]|min_length[6]|regex_match[' . PASSWORD_EXP . ']',
                    'errors' => [
                        'regex_match' => 'The {field} may only have characters,digits,underscore only.'
                    ]
                ]
            ]);

            if (!$validator->withRequest($request)->run()) {
                notify('Invalid Email/Password. Please try again!!', 'error', 'Alert');
                return redirect()->back()->withInput()->with('errors', $validator->getErrors());
            }
        }

    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\UserModel;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn'))
        {
            return redirect()->to(base_url("/"));
        }

        $model = new UserModel();
        $employee = $model->where('email', session()->get("email"))->first();


        if($employee["Active"]==0){

                session()->setFlashdata("errormessage", "Access denied!");
                return redirect()->to(base_url("/"));

        } 
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
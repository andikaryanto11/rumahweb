<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use Ci4Common\Services\ViewCollectionService;
use App\Override\Request;
use Ci4Common\Libraries\SessionLib;

class User extends BaseController
{

    /**
     * @var UserRepository $userRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var ViewCollectionService $viewCollectionService
     */
    protected ViewCollectionService $viewCollectionService;
    
    /**
     * Undocumented function
     *
     * @param UserRepository $userRepository
     * @param ViewCollectionService $viewCollectionService
     */
    public function __construct(
        UserRepository $userRepository,
        ViewCollectionService $viewCollectionService
    )
    {
        $this->userRepository = $userRepository;
        $this->viewCollectionService = $viewCollectionService;
        $this->validator = \Config\Services::validation();
    }

    public function index()
    {   
        $users = $this->userRepository->get('user');
        foreach($users as $user){
            echo $user->getId();
        }
        // $this->viewCollectionService->addView(view('welcome_message'));
        // return $this->viewCollectionService;
    }

    /**
     * GET user/register
     *
     * @return ViewCollectionService
     */
    public function register(){
        $this->viewCollectionService->addView(view('user/register'));
        return $this->viewCollectionService;
    }

    /**
     * POST user/do_register
     *
     * @return void
     */
    public function doRegister(Request $request){
        if(!$this->validator->setRules(
            [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[12]',
            ]
        )->withRequest($request)->run()){
            echo 'ancuk';
            return;
        }
        // echo json_encode($request->getPost());
        if(!$this->isPasswordValid($request->getPost('password'))){
            echo 'password gagal';
            die();
        }
        
        //  withRequest(>request)->run();
        // if (! $this->validate()->withRe) {
        //     echo "not valid email";
        // }®
        
    }

    public function create(Request $request){
        $post = $request->getPost();
        echo json_encode($this->userRepository->createUser('andik', 'aryanto', 'andikaryanto@andik.com'));
    }


    public function update(Request $request){
        $post = $request->getPost();
        echo json_encode($this->userRepository->updateUser('62a23256dd24f00a3046cbc8', 'andikaaa', 'aryantoooo'));
    }


    public function delete(Request $request){
        $post = $request->getPost();
        echo json_encode($this->userRepository->deletUser('62a23256dd24f00a3046cbc8'));
    }

    public function isPasswordValid($password){
        echo $password;
        $match = null;
        $result = preg_match("/(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/", $password, $match);
        // echo $result;
        return $result !== false && $result !== 0;
    }
}

<?php

namespace App\Controllers;

use App\Entities\User as EntitiesUser;
use App\Repositories\UserRepository;
use Ci4Common\Services\ViewCollectionService;
use App\Override\Request;
use Ci4Common\Libraries\RedirectLib;
use Ci4Common\Libraries\SessionLib;

class User extends BaseController
{

    public const SUCCESS_KEY_MESSAGE = 'success_msg';
    public const WARNING_KEY_MESSAGE = 'add_warning_msg';

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

    /**
     * GET user
     *
     * @return ViewCollectionService
     */
    public function index(Request $request): ViewCollectionService
    {   
        if(!SessionLib::get('user')){
            return RedirectLib::redirect('user/login');
        }
        $page = $request->getGet('page') != null ? $request->getGet('page') : 1;
        $limit = $request->getGet('limit') != null ? $request->getGet('limit') : 20;
        $param = [
            'page' => $page,
            'limit' => $limit,
        ];
        $users = $this->userRepository->get('user', $param);
        // foreach($users as $user){
        //     echo $user->getId();
        // }
        $this->viewCollectionService->addView(view('shared/header'));
        $this->viewCollectionService->addView(view('user/index', compact('users')));
        $this->viewCollectionService->addView(view('shared/footer'));
        return $this->viewCollectionService;
    }

    /**
     * GET user/register
     *
     * @return ViewCollectionService
     */
    public function register(): ViewCollectionService{
        
        $this->viewCollectionService->addView(view('user/register'));
        return $this->viewCollectionService;
    }

    /**
     * GET user/login
     *
     * @return ViewCollectionService
     */
    public function login(Request $request): ViewCollectionService {

        if(SessionLib::get('user')){
            return RedirectLib::redirect('user');
        }
        SessionLib::set('user', $request->getPost(['email']));
        $this->viewCollectionService->addView(view('user/login'));
        return $this->viewCollectionService;
    }


    /**
     * GET user/logout
     *
     * @return ViewCollectionService
     */
    public function logout(Request $request): ViewCollectionService{

        SessionLib::remove('user');
        $this->viewCollectionService->addView(view('user/login'));
        return $this->viewCollectionService;
    }

    /**
     * POST user/do_register
     *
     * @return RedirectLib
     */
    public function doRegister(Request $request){
        if(!$this->validator->setRules(
            [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[12]',
            ]
        )->withRequest($request)->run()){
            SessionLib::setFlashdata(self::WARNING_KEY_MESSAGE, ['The data you are registering is not valid']);
            return RedirectLib::redirect('user/register');
        }
        if(!$this->isPasswordValid($request->getPost('password'))){
            SessionLib::setFlashdata(self::WARNING_KEY_MESSAGE, ['Password is invalid']);
            return RedirectLib::redirect('user/register');
        }
        SessionLib::setFlashdata(self::SUCCESS_KEY_MESSAGE, ['You are registered']);
        return RedirectLib::redirect('user/login');
        
    }

    /**
     * POST user/create
     *
     * @return RedirectLib
     */
    public function create(Request $request): RedirectLib{
        $post = $request->getPost();
        $user = new EntitiesUser();
        $user->setFirstName($post['first_name']);
        $user->setLastName($post['last_name']);
        $user->setEmail($post['email']);
        $this->userRepository->createUser($user);
        SessionLib::setFlashdata(self::SUCCESS_KEY_MESSAGE, ['Data saved']);
        return RedirectLib::redirect('user');
    }

    /**
     * POST user/update
     *
     * @return RedirectLib
     */
    public function update(Request $request): RedirectLib{
        $post = $request->getPost();
        $user = new EntitiesUser();
        $user->setId($post['id']);
        $user->setFirstName($post['first_name']);
        $user->setLastName($post['last_name']);
        SessionLib::setFlashdata(self::SUCCESS_KEY_MESSAGE, ['Data updated']);
        return RedirectLib::redirect('user');
    }


    /**
     * POST user/delete
     *
     * @return RedirectLib
     */

     public function delete(Request $request): RedirectLib {
        $post = $request->getPost();
        echo json_encode($this->userRepository->deletUser('62a23256dd24f00a3046cbc8'));
        return RedirectLib::redirect('user');
    }

    /**
     * validate a password to meet requirements
     *
     * @param string $password
     * @return boolean
     */
    public function isPasswordValid(string $password): bool {
        echo $password;
        $match = null;
        $result = preg_match("/(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/", $password, $match);
        // echo $result;
        return $result !== false && $result !== 0;
    }
}

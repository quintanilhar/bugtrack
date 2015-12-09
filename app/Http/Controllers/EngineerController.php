<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\UserRepository;

class EngineerController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $filters = [
            'name' => $request->query('name', null)
        ];
        
        return $this->userRepository->fetchAllEngineers($filters);
    }
}

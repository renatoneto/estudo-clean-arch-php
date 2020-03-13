<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Skp\Application\Service\UserService;
use Skp\Domain\Exception\ValidationException;
use Skp\Domain\Validation\UserValidationInterface;

class UsersController extends Controller
{

    private UserService $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(Request $request)
    {
        try {

            $user = $this->userService->createUser(
                $request->only(['name', 'email']), app(UserValidationInterface::class)
            );

            return response()->json((new UserTransformer())->transform($user));

        } catch (ValidationException $e) {
            return response([
                'message' => $e->getMessage(),
                'errors' => $e->getErrors()
            ]);
        }
    }

    public function getUser($id)
    {
        try {

            $user = $this->userService->getUser($id);

            return response()->json((new UserTransformer())->transform($user));

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}

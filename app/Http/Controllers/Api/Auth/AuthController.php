<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendVerificationEmailJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\EmailverfyNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use Notifiable;
    private $auth;

    // public function __construct(AuthManager $auth)
    // {
    //     $this->auth = $auth->guard();
    // }



    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials))
        {
            throw new \Illuminate\Auth\AuthenticationException('Authentication failed.');
        }

        $user = Auth::user();

        if (!$user->email_verified_at)
        {
            throw new \Illuminate\Auth\AuthenticationException('Email not verified.');
        }
        if ($user->status == '0')
        {
            throw new \Illuminate\Auth\AuthenticationException('The user has been blocked.');
        }
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 200);
    }



    public function logout(Request $request)
    {

        $request->user->tokens()->delete();
        return response()->json(['message' => 'Success', 'status_code' => 200,], 200);
    }




    public function register(RegisterRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'fcm' => $request->fcm,
                'password' => Hash::make($request->password),
            ]);

            SendVerificationEmailJob::dispatch($user)->delay(now()->addSeconds(20));;
            $token = $user->createToken('Laravel Sanctum')->plainTextToken;
            $user->assignRole(["user"]);
            DB::commit();
            // sleep(20);  // Wait for 5 seconds
            Artisan::call('queue:work');
            return response()->json(['token' => $token, 'message' => 'Success', 'status_code' => 200], 200);
        }
        catch (\Throwable $th)
        {
            DB::rollback();
            //throw $th;
        }
    }


}
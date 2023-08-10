<?php

namespace App\Http\Controllers\Api\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPassNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Ichtrojan\Otp\Otp;

class ResetPasswordController extends Controller
{
    public $otp;
    public function __construct() {
        $this->otp = new Otp;
    }


    public function forgotPassword(Request $request)
    {
       $request->validate([
            'email' => 'required|email|exists:users',
        ]);
      
        $inpout=$request->only('email');
        $user=User::where('email',$inpout)->first();
        $user->notify(new ResetPassNotification);
        $user->tokens()->delete();
        return response()->json(['message' => 'Success','status_code' => 200,],200 );
    }




        public function resetPassword(Request $request)
        {
            try {
                $request->validate([
                    'new_password' => [
                        'required',
                        'string',
                        'min:8',
                        function ($attribute, $value, $fail) use ($request) {
                            // Check if the new password is different from the current password
                            $user = User::where('email', $request->user->email)->first();
                            if ($user && Hash::check($value, $user->password)) {
                                $fail('The new password must be different from the current password.');
                            }
                        },
                    ],
                    'new_password_confirmation' => 'required|string|same:new_password',
                ]);

                $user = User::where('email', $request->user->email)->first();
                $user->password = bcrypt($request->new_password);
                $user->save();
                $user->tokens()->delete();

                return response()->json([
                    'message' => 'Password reset successful!',
                    'status_code' => 200,
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'An error occurred while resetting the password.',
                    'status_code' => 500,
                ], 500);
            }
        }
}
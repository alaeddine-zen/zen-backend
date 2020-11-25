<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $response = Http::get('https://dev.zenhosting.app/includes/api.php', [
            'action'=>'ValidateLogin',
            'email'=>request('email'),
            'password2' => request('password'),
            'username'=>'sn6I8c5XrzTJnEsOztq0NtM7ejEyqoTs',
            'password'=>'WPUNrlXziZamWPaKIdwzUoHVocPeyXaB',
            'accesskey'=>'zenLSbUtPDMpw9b7a6zu67h5n8ksp82Cqf62utYHSpxfq',
            'responsetype'=>'JSON'

        ]);
        $response2 = Http::get('https://dev.zenhosting.app/includes/api.php', [
            'username'=>'sn6I8c5XrzTJnEsOztq0NtM7ejEyqoTs',
            'password'=>'WPUNrlXziZamWPaKIdwzUoHVocPeyXaB',
            'accesskey'=>'zenLSbUtPDMpw9b7a6zu67h5n8ksp82Cqf62utYHSpxfq',
            'action' => 'GetClientsDetails',
            // See https://developers.whmcs.com/api/authentication
            'clientid' => $response['userid'],
            'stats' => true,
            'responsetype' => 'json',
        ]);
        $response3 = Http::get('https://dev.zenhosting.app/includes/api.php', [
            'username'=>'sn6I8c5XrzTJnEsOztq0NtM7ejEyqoTs',
            'password'=>'WPUNrlXziZamWPaKIdwzUoHVocPeyXaB',
            'accesskey'=>'zenLSbUtPDMpw9b7a6zu67h5n8ksp82Cqf62utYHSpxfq',
            'action' => 'DecryptPassword',

            'password2' => 'HfvVFiDoQb3vSV5r9HwYv/dprwOoxE/uZ8qM+FZf',
            'responsetype' => 'json',
        ]);

//        $model = User::where('wh_id', '=', $response['userid'])->first();
//        if($model){
//
//            $model->name = $response2['fullname'];
//            $model->email = $response2['email'];
//            $model->wh_id = $response['userid'];
//            $model->password = $response3['password'];
//            $model->role = 'Admin';
//            $model->save();
//                    if (Auth::attempt(['email' => $response2['email'], 'password' => $response3['password']])) {
//            $user = Auth::user();
//            $success['token'] = $user->createToken('token')->accessToken;
//            return response()->json(['success' => $success], $this->successStatus);
//        } else {
//                        return response()->json(['status' => false, 'error' => 'Unauthorised'], 401);
//        }
//
//        }else{
//            $client = new User();
//            $client->name = $response2['fullname'];
//            $client->email = $response2['email'];
//            $client->wh_id = $response['userid'];
//            $client->password = $response3['password'];
//            $client->role = 'Admin';
//            $client->save();
//
//
//        }
        return $response3 ;
//        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
//            $user = Auth::user();
//            $success['token'] = $user->createToken('token')->accessToken;
//            return response()->json(['success' => $success], $this->successStatus);
//        } else {
//            return response()->json(['status' => false, 'error' => 'Unauthorised'], 401);
//        }
    }
}

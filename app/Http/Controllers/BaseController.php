<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApplicationSession;
use Config;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class BaseController extends Controller
{

    public function sendResponse($result, $msg)
    {
        $response = [
            'success' => true,
            'message' => $msg,
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }
        return response()->json($response, 200);
    }

    public function sendError($error_msg, $error = null)
    {
        $response = [
            'success' => false,
            'message' => $error_msg,
        ];
        if (isset($error)) {
            $response['errors'] = $error;
        }

        return response()->json($response, 400);
    }

    // get all record based on session
    public function getAllRecord($model){
        return $model->where('session_id',$this->getAppSessionId())->get();
    }
    
    // get record by id based on session
    public function getRecordById($model,$id){
        return $model->where('session_id',$this->getAppSessionId())->find($id);
    }

    // Send Status Success
    public function sendWithSuccess($msg)
    {
        $response = ['success' => true, 'message' => $msg];
        return ['status' => $response];
    }

    // Send Status Error
    public function sendWithError($msg)
    {
        $response = ['success' => false, 'message' => $msg];
        return ['status' => $response];
    }

    // Get Current ApplicationSession
    public function setAppSession(ApplicationSession $appSession): RedirectResponse
    {
        session()->forget(config('app.appSession'));
        session()->put(config('app.appSession'), ["id" => $appSession->id, "name" => $appSession->name]);
        return Redirect::back()->with($this->sendWithSuccess('Session Switched.'));
    }

    // Get Current ApplicationSession
    public function getAppSession(): array
    {
        $currentSession = null;
        if (session()->has(config('app.appSession'))) {
            $currentSession = session()->get(config('app.appSession'));
        }
        return  $currentSession;
    }
    // Get Current ApplicationSessionName
    public function getAppSessionName(): string
    {
        $currentSession = null;
        if (session()->has(config('app.appSession'))) {
            $currentSession = session()->get(config('app.appSession'))['name'];
        }
        return  $currentSession;
    }
    // Get Current ApplicationSessionId
    public function getAppSessionId(): int
    {
        $currentSession = null;
        if (session()->has(config('app.appSession'))) {
            $currentSession = session()->get(config('app.appSession'))['id'];
        }
        return  $currentSession;
    }

    // check permission
    public function checkAuthorizetion($permission){
        abort_if(Gate::denies($permission), Response::HTTP_FORBIDDEN, '403 forbidden');
    }

}

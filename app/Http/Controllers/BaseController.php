<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApplicationSession;
use Config;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Strings;

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

    //    Set cookie
    public function setCookie($cookie_name, $cookie_value)
    {
        $domain = ($_SERVER['SERVER_NAME'] != 'localhost') ? $_SERVER['SERVER_NAME'] : '.' . $_SERVER['SERVER_NAME'];
        $this->destroyCookie($cookie_name);
        setcookie($cookie_name, $cookie_value, time() + 2147483647, '/', $domain);
    }

    // Get cookie
    public function getCookie($cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])) {
            return $_COOKIE[$cookie_name];
        } else {
            return false;
        }
    }
    // Has cookie
    public function hasCookie($cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])) {
            return true;
        } else {
            return false;
        }
    }

    // Destroy cookie
    public function destroyCookie($cookie_name)
    {
        $domain = ($_SERVER['SERVER_NAME'] != 'localhost') ? $_SERVER['SERVER_NAME'] : '.' . $_SERVER['SERVER_NAME'];
        if (isset($_COOKIE[$cookie_name])) {
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 2147483647, '/',  $domain);
        }
    }

    // Clear cookie
    public function clearCookie()
    {
        $domain = ($_SERVER['SERVER_NAME'] != 'localhost') ? $_SERVER['SERVER_NAME'] : '.' . $_SERVER['SERVER_NAME'];
        if (isset($_COOKIE['Stocky_token'])) {
            unset($_COOKIE['Stocky_token']);
            setcookie('Stocky_token', '', time() - 2147483647, '/', $domain); // empty value and old timestamp
        }
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

}

<?php

namespace App\Http\Middleware;


class ApiToken
{
    /**
     * API Token/Key Authentication
     *
     * @return \Illuminate\Http\Response
     */
    public static function authenticate($request)
    {
        $isAuthenticated = false;
        //TODO: I will create a table for all of the registered user with created API Keys and will add a condition
        //here to allow a certain user with a valid created API key to access the resources.
       if($request->apiKey == "f3969c45-f33d-48f0-9ab7-f4f047725a56"){
            $isAuthenticated = true;
       }

       return $isAuthenticated;
    }
}



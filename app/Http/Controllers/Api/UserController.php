<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    
    public function index(Request $request)
    {
    
        $dataProviderDirectory = public_path('files');

        // Get all JSON files in the directory
        $dataProviderFiles = File::files($dataProviderDirectory);
        $users = [];

        foreach ($dataProviderFiles as $file) {

            $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $data = json_decode(File::get($file->getPathname()), true);
            $users[$filename] = $data;

        }

        if ($request->has('provider')) {
            $specifiedProvider = $request->provider;
            $filteredData = [];
            foreach ( $users as $filename => $data) {
                if (strpos($filename, $specifiedProvider) !== false) {
                    $filteredData[$filename] = $data;
             }
           }

         }
       
        if ($request->has('statusCode')) {
            $users = array_filter($users, function ($user) use ($request) {
                return isset($user['statusCode']) && $user['statusCode'] == $request->statusCode;
            });
        }

        if ($request->has('balanceMin') && $request->has('balanceMax')) {
            $min = $request->balanceMin ;
            $max = $request->balanceMax ;
            $users = array_filter($users, function ($user) use ($min, $max) {
                return isset($user['balance']) && $user['balance'] >= $min && $user['balance'] <= $max;
            });
        }

        if ($request->has('currency')) {

            $users = array_filter($users, function ($user) use ($request) {
                
                return isset($user['currency']) && $user['currency'] == $request->currency;
            });
        }

        $filteredUsers = array_values($users);

        return response()->json($filteredUsers);

    }


   


}

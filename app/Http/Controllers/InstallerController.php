<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;

class InstallerController extends Controller
{
    //
    public function dbEnvUpdate(Request $request)
    {
        $request->validate([
            'DB_HOST' => 'bail|required|',
            'DB_DATABASE' => 'bail|required|',
            'DB_USERNAME' => 'bail|required|',

        ]);
        $data = [
            'DB_HOST' => $request->DB_HOST,
            'DB_DATABASE' => $request->DB_DATABASE,
            'DB_USERNAME' => $request->DB_USERNAME,
            'DB_PASSWORD' => $request->DB_PASSWORD,
        ];
        $resData = [];

        // Read .env-file
        if (is_writeable("../.env")) {

            $env = file_get_contents('../.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);

            // Loop through given data
            foreach ((array) $data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents('../.env', $env);
            // $admin = MainSetting::find(1);
            // // $admin->notify(new ForgotPassword($password));
            //  $admin->email_status=$request['email_status'];
            //  $admin->save();
            $resData['status'] = 'success';
            $resData['data'] = 'env file updated successfully.';
            if($this->run( $request->DB_HOST,$request->DB_DATABASE,$request->DB_USERNAME,$request->DB_PASSWORD)!="true"){
                return response('Something went wrong', 400);
            }
        } else {
            $resData['status'] = 'fail';
            $resData['data'] = 'dont have write purmision.';
            return response('dont have write purmision', 400);
        }
        return "true";
    }
    public function run($host,$dsn, $user, $password){
        try {
            $path=public_path('demo.sql');
            $db = new \PDO("mysql:host=$host;dbname=$dsn", $user, $password);
            $sql = file_get_contents($path);
            $qr = $db->exec($sql);
            if($qr){
                return "true";
            } else{
                return "false";
            }
        }catch(\Exception $e){
            return "false";
        }
       
       

    }
    
}

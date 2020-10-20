<?php
// $db_host = $_REQUEST['DB_HOST'];
// $db_name = $_REQUEST['DB_DATABASE'];
// $db_username = $_REQUEST['DB_USERNAME'];
// $db_password = $_REQUEST['DB_PASSWORD'];
$resData = [];

if (isset($_REQUEST['DB_PASSWORD'])) {
    $db_host = $_REQUEST['DB_HOST'];
    $db_name = $_REQUEST['DB_DATABASE'];
    $db_username = $_REQUEST['DB_USERNAME'];
    $db_password = $_REQUEST['DB_PASSWORD'];
    $MAIL_FROM_ADDRESS = $_REQUEST['MAIL_FROM_ADDRESS'];
    $MAIL_PASSWORD = $_REQUEST['MAIL_PASSWORD'];
    $MAIL_USERNAME = $_REQUEST['MAIL_USERNAME'];
    $MAIL_PORT = $_REQUEST['MAIL_PORT'];
    $MAIL_HOST = $_REQUEST['MAIL_HOST'];

    changeEnv([
        'DB_DATABASE' => $db_name,
        'DB_USERNAME' => $db_username,
        'DB_HOST' => $db_host,
        'DB_PASSWORD' => $db_password,
        'MAIL_FROM_ADDRESS' => $MAIL_FROM_ADDRESS,
        'MAIL_PASSWORD' => $MAIL_PASSWORD,
        'MAIL_USERNAME' => $MAIL_USERNAME,
        'MAIL_PORT' => $MAIL_PORT,
        'MAIL_HOST' => $MAIL_HOST,
    ]);
    $temp = run($db_host, $db_name, $db_username, $db_password);
    if ($temp['status'] != 'true') {
        $resData['status'] = 'fail';
        $resData['data'] = $temp['msg'];
        echo json_encode($resData);
        exit();

    } else {
        $resData['status'] = 'success';
        $resData['data'] = 'CLICK NEXT.';
        echo json_encode($resData);
        exit();
    }
}

function changeEnv($data = array())
{
    $resData = [];
    if (count($data) > 0) {

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
            $resData['status'] = 'success';
            $resData['data'] = 'CLICK NEXT.';
            if (isset($_REQUEST['MAIL_HOST'])) {
                // echo json_encode($resData);

            }

        } else {
            $resData['status'] = 'fail';
            $resData['data'] = 'dont have write purmision.';
            echo json_encode($resData);
            exit();

        }

        //echo json_encode($resData);

    }
}
function run($host, $dsn, $user, $password)
{

    try {
        $path = 'demo.sql';
        $db = new \PDO("mysql:host=$host;dbname=$dsn", $user, $password);
        $sql = file_get_contents($path);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // $stmt = $dbh->prepare('bogus sql');
        $qr = $db->exec($sql);
        // echo $qr;
        // $qr=true;
        if ($qr == 0) {
            $data['status'] = 'true';
            $data['msg'] = 'data is submitted';
            return $data;
        } else {
            $data['status'] = 'false';
            $data['msg'] = 'Something Went Wrong';
            return $data;
        }
    } catch (\Exception $e) {
        $data = array();
        $data['status'] = 'false';
        $data['msg'] = $e->getMessage();
        return $data;
    }

}

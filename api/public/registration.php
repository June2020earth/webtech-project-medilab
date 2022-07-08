<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Kreait\Firebase\Contract\Storage ;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\ServiceAccount;
use Slim\App;

return function(App $app)
{
    //Register user
    $app->post(
        "/register",
        function (Request $request, Response $response, $args) {
            $data = $request->getBody();
            $serviceAccount = ServiceAccount::fromValue(__DIR__ . '/../key.json');
            $Firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://fir-testing-6d2f3-default-rtdb.firebaseio.com/')->createDatabase();
            $dataInJson = json_decode($data);
            $e = json_decode(($dataInJson));
            $userr = new userModel($e->email, $e->password);
            $userr->email = str_replace('.', '', $userr->email);

            $dbRef = $Firebase->getReference("user/$userr->email");
            if ($dbRef->getSnapshot()->exists()) {
                $response->getBody()->write("Email has been used");
            } else {
                $dbRef->set($userr);
                if ($dbRef->getSnapshot()->exists()) {
                    $response->getBody()->write("Registration Success");
                } else {
                    $response->getBody()->write(
                        [
                            "status" => 1
                        ]
                    );
                }
            }
            return $response;
        }
    );
    $app->post(
        "/login",
        function (Request $request, Response $response, $args) {
            $data = $request->getBody();
            $serviceAccount = ServiceAccount::fromValue(__DIR__ . '/../key.json');
            $Firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://fir-testing-6d2f3-default-rtdb.firebaseio.com/')->createDatabase();
            $dataInJson = json_decode($data);
            $e = json_decode(($dataInJson));
            $userr = new userModel($e->email, $e->password);
            $userr->email = str_replace('.', '', $userr->email);

            $dbRef = $Firebase->getReference("user/$userr->email");
            if ($dbRef->getSnapshot()->exists()) {
                $value=$dbRef->getSnapshot()->getValue();
                $value=json_decode($value);
                if($value->email==$userr->email and $value->password==$userr->password)
                {
                    $response=$response->withHeader("Authorization","token");
                    $message=[
                        "status"=>true
                    ];
                    $response->getBody()->write(json_encode($message));
                }
                
                
            }
            return $response;
        }
    );

};
?>
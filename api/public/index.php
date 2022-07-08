<?php
// php -S localhost:8080 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Kreait\Firebase\Contract\Storage ;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\ServiceAccount;

require __DIR__ . '/../../vendor/autoload.php';
require_once('../model/user.php');
$app = new \Slim\App;

$registerRoutes=require __DIR__ . '/registration.php';
$registerRoutes($app);
$app->run();

// $app->get('/', function (Request $request, Response $response, $args) {
//     // $serviceAccount=ServiceAccount::fromValue(__DIR__.'/../key.json');
//     // $Firebase=(new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://fir-testing-6d2f3-default-rtdb.firebaseio.com/')->createDatabase();
//     // // //$database=$Firebase->getDatabase();
//     // $fromuser=$request->getAttributes('email');
//     // $data=$Firebase->getReference('user')->push($fromuser);
    
//     // // //$firebase=$firestore->database();
    
//     // print($request->getAttributes('email')[0]);
//     // $response->getBody()->write($request->getAttributes('email')[0]);
//     // return $response;
// });


// $app->post('/',function(Request $request,Response $response,$args)
// {
    
//     $data = $request->getBody();
//     $serviceAccount=ServiceAccount::fromValue(__DIR__.'/../key.json');
//     $Firebase=(new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://fir-testing-6d2f3-default-rtdb.firebaseio.com/')->createDatabase();
//     $dataInJson=json_decode($data);
//     $e=json_decode(($dataInJson));
//     $userr=new userModel($e->email,$e->password);
//     $userr->email=str_replace('.','',$userr->email);
    
//     $dbRef=$Firebase->getReference("user/$userr->email");
//     if($dbRef->getSnapshot()->exists())
//     {
        
//         $response->getBody()->write(
//             "Email has been used");
//             $response=$response->withHeader("Authorization","123");
//             $response->getBody()->write($response->getHeaderLine("Authorization"));
//     }
//     else
//     {
//         $dbRef->set($userr);
//         if($dbRef->getSnapshot()->exists())
//         {
//             $response->getBody()->write(
//                 "Registration Success");
            
                
//         }
//         else
//         {
//             $response->getBody()->write(
//                 [
//                     "status"=>1
//                 ]
//                 );
//         }

//     }
//     return $response;
//     $Firebase->getReference("user/$userr->email")->set(json_encode($userr));
//     #$Firebase->getReference("user")->push(json_decode(json_encode($userr)));
//     $response->getBody()->write("Success");
//     return $response;
// }
// );
// $app->get('/',function(Request $request,Response $response,$args)
// {
//     $email='ricky.k@graduate.utm.my';
//     $email=str_replace('.','',$email);
//     $serviceAccount=ServiceAccount::fromValue(__DIR__.'/../key.json');
//     $Firebase=(new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://fir-testing-6d2f3-default-rtdb.firebaseio.com/')->createDatabase();
//     $snapshot=$Firebase->getReference("user/$email ")->set(
//         [
//             'email'=>'ricky.k@graduate.utm.my',
//             'password'=>'12345'
//         ]
//     );
//     $snapshot=$Firebase->getReference('user/rickyy')->getSnapshot();
//     $response->getBody()->write(json_encode($snapshot->exists()));
//     return $response;
// }
// );

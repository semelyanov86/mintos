<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response ;
use GuzzleHttp\Client as GuzzleClient;
use App\User;

class MainController extends Controller
{
    private $wordstat;

    public function getRss()
    {
        // https://www.theregister.co.uk/software/headlines.atom
        $client = new GuzzleClient();
        $response = $client->get('https://www.theregister.co.uk/software/headlines.atom');
        if ($response->getStatusCode() == 200) {
            $body = $response->getBody()->getContents();
            $xml = simplexml_load_string($body, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            $this->wordstat = count_files_in_array($array['entry'], array('title', 'summary'), 10);
            return view('welcome')->with('status', 'OK')->with('data', $array['entry'])->with('wordstat', $this->wordstat);
        } else {
            return view('welcome')->with('status', 'ERROR')->with('data', array())->with('wordstat', array());
        }

    }

    public function checkEmail(Request $request)
    {
        $request->session()->regenerate();
        $email = $request->get('params');
        $email = $email['email'];
        $findUser = User::where('email', $email)->first();
        if ($findUser) {
            $result = array('result' => '1');
        } else {
            $result = array('result' => '2');
        }
        $response = Response::json($result);
        return $response;
    }
}

<?
class DLClient {
	private $session;

	function __construct($appKey){
		$appKey?$this->appKey = $appKey:die("No app key given");
	}

	function auth($login, $password){
        $url = 'https://api.dellin.ru/v3/auth/login.json';
		$body = array(
			'login' => $login,
			'password' => $password,
			'appKey' => $this->appKey
		);

		$opts = array(
			'http' => array(
				'method' => 'POST',
				'header' => "Content-Type: application/json",
				'content' => json_encode($body)
			)
		);
		$result = file_get_contents($url, false, stream_context_create($opts));
		$res = (array)json_decode($result);
		$array = json_decode(json_encode($res), true);
		$this->session = $array['data']['sessionID'];
	}

    function request($op, $params = array()){
        $url = 'https://api.dellin.ru/'.$op.'.json';
        $body = $params;
        $body["appKey"] = $this->appKey;
        if (isset($this->session)){
            $body["sessionID"] = $this->session;
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($ch);
        curl_close($ch);

        $this->result = (array)json_decode($result);
    }
}
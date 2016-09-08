<?
class Router
{
	public function getUrl()
	{
		$serverData = $_SERVER;
		$ssl = ( isset($serverData['HTTPS']) && $serverData['HTTPS'] == 'on'  );
		$serverProtocol = strtolower($serverData['SERVER_PROTOCOL']);
		$protocol = substr( $serverProtocol, 0, strpos($serverProtocol, '/') ) . ($ssl ? 's' : '');
		$port = $serverData['SERVER_PORT'];
		$port = ( (!$ssl && $port == '80') || ( $ssl && $port == '443' ) ) ? '' : $port;
		$host = $serverData['HTTP_HOST'];
		$host = isset($host) ? $host : $serverData['SERVER_NAME'];
		$uri = $serverData['REQUEST_URI'];

		return $protocol . '://' . $host . $uri;
	}
	public function getUrlPart($url, $partNum)
	{
		$url = substr( $url, strpos($url,'//') + 2, strlen($url));
		$exploded = explode('/',$url);
		var_dump($exploded);
		if ( key_exists($partNum, $exploded) )
		{
			return $exploded[$partNum];
		}
		else
		{
			return false;
		}
	}
}
?>

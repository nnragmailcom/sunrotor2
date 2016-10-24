<?
namespace sunrotor\classes;
class Router
{
	public static function getUrl($addrSource = 'uri')
	{
		$serverData = $_SERVER;
		$ssl = ( isset($serverData['HTTPS']) && $serverData['HTTPS'] == 'on'  );
		$serverProtocol = strtolower($serverData['SERVER_PROTOCOL']);
		$protocol = substr( $serverProtocol, 0, strpos($serverProtocol, '/') ) . ($ssl ? 's' : '');
		$port = $serverData['SERVER_PORT'];
		$port = ( (!$ssl && $port == '80') || ( $ssl && $port == '443' ) ) ? '' : $port;
		$host = $serverData['HTTP_HOST'];
		$host = isset($host) ? $host : $serverData['SERVER_NAME'];
		if ( $addrSource == 'uri' )
		{
			$addr = $serverData['REQUEST_URI'];
		}
		elseif ( $addrSource == 'ref' ) {
			$addr = $serverData['HTTP_REFERER'];
		}
		$uri = $addr;


		return $protocol . '://' . $host . $uri;
	}
	public static function getUrlPart($url, $partNum)
	{
		$url = substr( $url, strpos($url,'//') + 2, strlen($url));
		$exploded = explode('/',$url);
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

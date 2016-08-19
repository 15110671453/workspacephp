<?php

/**
 * @package SlightPHP
 * @subpackage SCache
 */
class CacheFile {
	
	/**
	 *
	 * @var string $dir cache dir
	 */
	var $dir = "cache";
	
	/**
	 *
	 * @var int $depth cache dir depth
	 */
	var $depth = 3;
	
	/**
	 * init
	 *
	 * @param array $params
	 *        	array("dir","depth")
	 */
	function init($params = array()) {
		foreach ( $params as $key => $value ) {
			$this->$key = $value;
		}
	}
	
	/**
	 * set cache
	 *
	 * @param string $key        	
	 * @param mixed $value        	
	 * @param int $timestamp
	 *        	default:-1 forever
	 * @return boolean
	 */
	function set($key, $value, $timestamp = -1) {
		$realFile = $this->_getDir ( $key, true );
		if (! $realFile) {
			return false;
		}
		$timeout = $timestamp == - 1 ? - 1 : (time () + $timestamp);
		
		$fp = fopen ( $realFile, "w" );
		if (! $fp) {
			return false;
		}
		flock ( $fp, LOCK_EX );
		$content = $timeout . "\r\n" . serialize ( $value );
		fputs ( $fp, $content );
		flock ( $fp, LOCK_UN );
		fclose ( $fp );
		return true;
	}
	
	/**
	 * get cache
	 *
	 * @param string $key        	
	 * @return mixed $result
	 */
	function get($key) {
		$realFile = $this->_getDir ( $key );
		if (! $realFile || ! is_file ( $realFile )) {
			return false;
		}
		$fp = fopen ( $realFile, "r" );
		if (! $fp) {
			return false;
		}
		flock ( $fp, LOCK_SH );
		$timeout = trim ( fgets ( $fp ) );
		if (! empty ( $timeout )) {
			$timenow = time ();
			if ($timeout == - 1 || $timenow < $timeout) {
				$data = fread ( $fp, filesize ( $realFile ) );
				flock ( $fp, LOCK_UN );
				fclose ( $fp );
				return unserialize ( $data );
			} else {
				// 过期了，应该删除这个文件，但为了性能考虑，不删除
			}
		}
		flock ( $fp, LOCK_UN );
		fclose ( $fp );
		return false;
	}
	
	/**
	 * delete cache
	 *
	 * @param string $key        	
	 * @return boolean
	 */
	function del($key) {
		$realFile = $this->_getDir ( $key );
		if (! $realFile || ! is_file ( $realFile )) {
			return true;
		}
		return unlink ( $realFile );
	}
	private function _getDir($key, $mk = false) {
		$str = md5 ( $key );
		$step = ceil ( strlen ( $str ) / ($this->depth + 1) );
		$tmp = array ();
		for($i = 0; $i <= $this->depth; $i ++) {
			$path = substr ( $str, $i * $step, $step );
			if ($path)
				$tmp [] = $path;
		}
		
		$realFile = $this->dir . DIRECTORY_SEPARATOR . implode ( DIRECTORY_SEPARATOR, $tmp ) . ".data";
		if ($mk) {
			$dirname = dirname ( $realFile );
			if (! is_dir ( $dirname )) {
				if (! mkdir ( $dirname, 0777, true )) {
					return false;
				}
			}
		}
		return $realFile;
	}
}
?>

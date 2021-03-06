<?php
/**
 * user.class.php
 *		用户操作类
 * 
 * @author Harry
 * @since 2014.7.11
 * @link http://haoshengzhide.com/
 */
class user extends Module {
	public function __construct() {
		parent::__construct ( __CLASS__ );
		$this->tableName = 'user';
	}
	public function getList($where) {
		$result = array ();
		$p = $where ['p'];
		$pagesize = $where ['pagesize'];
		$limit = ' limit ' . ($p - 1) * $pagesize . ',' . $pagesize;
		
		$whereStr = ' WHERE 1=1 AND status != "4" ';
		$sql = "SELECT * FROM `" . gtn ( 'user' ) . "`" . $whereStr . $limit;
		
		$result ['list'] = $this->query ( $sql );
		$result ['total'] = $this->count ( $whereStr );
		return $result;
	}
	public function getAccountInfo() {
		$this->tableName = 'account';
		return $this->first ( array (
				'id' => 1 
		) );
	}
	public function getInfoByWhere($where) {
		$return = $this->select ( NULL, $where );
		// p($this->db->getSql());exit;
		echo  'getInfoByWhere<br/>';
		return $return;
	}
	public function mymd5($string) {
		return md5 ( base64_decode ( $string ) . '谁不会休息，谁就不会工作。（列宁）—— Have a rest please.' . json_encode ( $string ) );
	}
	public function updateInfo($row, $where) {
		$this->tableName = 'user';
		$return = $this->update ( $row, $where );
		return $return;
	}
	public function add($row) {
		$this->tableName = 'user';
		$return = $this->insert ( $row );
		return $return;
	}
	public function chkAdd($username) {
		$sql = "SELECT COUNT(*) AS total FROM " . gtn ( 'user' ) . " WHERE username = '$username' AND status != '4'";
		$return = $this->query ( $sql );
		if ($return [0] ['total'] > 0) {
			return FALSE;
		}
		return TRUE;
	}
}
<?php
/**
 * loginAction.class.php
 *			用户管理
 * 
 * @author Harry
 * @link http://haoshengzhide.com 
 * @since 2014.7.11
 */
require_once MODEL_PATH . 'user.class.php';
require_once LIB_PATH . 'Module.class.php';
class loginAction extends Action {
	public $M;
	public function __construct() {
		parent::__construct ();
		$this->M = new user ();
	}
	public function index() {
		echo 'test test loginAction loginIndex<br/>';
		$this->display ( 'admin/login/index.html' );
	}
	
	// 执行登录操作
	public function doLogin() {
	
		if ($_POST ['username'] && $_POST ['password']) {
			$where = array ();
			$where ['username'] = filter_input ( INPUT_POST, 'username' );
			$where ['password'] = $this->M->mymd5 ( filter_input ( INPUT_POST, 'password' ) );
			$where ['status'] = '1';
		
			$result = $this->M->getInfoByWhere ( $where );
			if ($result) {
				
				$this->loginSuccess ( $result [0] ['id'] );
				$_SESSION ['userinfo'] = $result [0];
				$_SESSION ['accountinfo'] = $this->M->getAccountInfo ();
				$_SESSION ['userinfo'] ['rankArr'] = explode ( ',', $_SESSION ['userinfo'] ['rankstr'] );
				// $_SESSION['userinfo']['rankArr'][] = 'login';
				// $_SESSION['userinfo']['rankArr'][] = 'norank';
				
				redirect ( '/index.php/statistical/index' );
			} else {
			
				redirect ( '/index.php/login/index/', 1, '用户名或密码错误' );
			}
		}
// 		echo "test test loginAction2<br/>";
// 		exit();
// 		redirect ( '/index.php/login', 1, '请检查账号或密码是否为空' );
	}
	public function logout() {
		echo "test test login";
		unset ( $_SESSION ['userinfo'] );
		session_destroy ();
		redirect ( '/index.php/login', 1, '退出成功' );
	}
	
	// to do some userful things
	private function loginSuccess($uid) {
		echo "test test login";
		$info = array ();
		$info ['lasttime'] = time ();
		$this->M->update ( $info, array (
				'id' => $uid 
		) );
	}
}
<?php 

	class tblUsers extends Model {
		private $_isLoggedIn;
		private $_sessionName;
		private $_cookieName;
		private $_error;
		private $_aclString;
		private $_user;

		public static $currentLoggedInUser = null;

		public function __construct ($user='') {

			$table = 'tblUsers';
			
			parent::__construct ($table);
			$this->_sessionName = CURRENT_USER_SESSION_NAME;
			$this->_cookieName	= REMEMBER_ME_COOKIE_NAME;
				
			// Het is mij nog niet duidelijk waarom dit gedaan wordt
			// Mogelijk als ik de volgende filmpjes gezien heb, kan ik hiermee spelen.
			if ($user != '') {
				$_BindParams = [':invoerParam1' => $user,
								':invoerParam2' => $user];
				$this->_u	 = $this->query ('Select * From tblUsers Where userName = :invoerParam1 or userEmail = :invoerParam2 Limit 1', $_BindParams);

			}

			if ($this->_u) {
				foreach ($this->_u as $key => $val) {
					$this->$key = $val;
				}
			}
		}

		public function findUser ($userName) {
				$_BindParams = [':invoerParam1' => $userName,
								':invoerParam2' => $userName];
				$this->_user = $this->query ('Select * From tblUsers Where userName = :invoerParam1 or userEmail = :invoerParam2 Limit 1', $_BindParams);
				return $this->_user;
		}

		public function login ($rememberMe = false, $acl) {
			
			foreach ($acl as $machtiging) {
				$this->_aclString .= ';';
				$this->_aclString .= $machtiging->recht;
				$this->_aclString .= ';';
				$this->_aclString .= $machtiging->toegewezen;
			}
			session::set ($this->_sessionName, $this->_user->userId . $this->_aclString);
			if ($rememberMe) {
				$hash 			= md5(uniqid() + rand (0, 100));
				$userAgent 		= UAgent::uAgentNoVersion ();
				Cookie::set ($this->_cookieName, $hash, REMEMBER_COOKIE_EXPIRY);

				$fields			= [':sessionUser'=>$this->_user [0]->userId, ':sessionSession'=>$hash, 'sessionAgent'=>$userAgent];
				$_bindParams 	= [':userId' => $this->_user [0]->userId, ':userAgent' => $userAgent];
				try {
					$this->query ('Delete From tblSessions Where `sessionUser` = :userId And `sessionAgent` = :userAgent', $_bindParams);
				} catch (PDOException $e) {
					$this->_error = $e->getMessage();
				}
				
				try {
					$this->query ('Insert Into tblSessions (`sessionUser`, `sessionSession`, `sessionAgent`) Values (:sessionUser, :sessionSession, :sessionAgent)', $fields);
				} catch (PDOException $e) {
					$this->_error = $e->getMessage();
				}
			}
		}

		public function logOut () {
			session::delete ($this->_sessionName);
		}

	}

?>

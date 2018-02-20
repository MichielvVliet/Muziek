<?php

	class Register extends Controller {

		public function __construct ($controller, $action) {

			parent::__construct ($controller, $action);
			$this->loadModel ('tblUsers');
			$this->loadModel ('tblAcl');
			$this->view->setLayout ('default');	
		}

		public function loginAction() {
			
			$validatie = new Validate ();
			If ($_POST) {
				$validatie->controleren ($_POST, [
											'username' => [
												'display' 	=> "UserName",
												'required' 	=> true],
											'password' => [
												'display' 	=> "Password",
												'required' 	=> true,
												'min' => 6,
												'max' => 15],
										]);
				
				If ($validatie->success ()) {
					$user = $this->tblUsersModel->findUser ($_POST ['username']);
					If ($user && isset ($_POST ['password'])) {	
						If (password_verify ($_POST ['password'], $user[0]->userPassword)) {
							$remember = false;
							If (isset($_POST['onthoudtMe'])) {
								$remember = true;
							}
							$acl = $this->tblAclModel->haalMachtigingen ($user [0]->userId);
							$this->tblUsersModel->login ($remember, $acl);
							Router::redirect ('');
						}
					}
				} else {
					$data = $validatie->fouten ();
					$this->view->setFouten ($data);
				}
			}
			$this->view->render('register/login');
		}

		public function logOutAction() {
			$this->tblUsersModel->logOut ();
			Router::redirect ('');
		}

		public function registerAction() {
			$validatie = new Validate ();
			If ($_POST) {
				$validatie->controleren ($_POST, [
											'username' => [
												'display' 	=> "UserName",
												'verplicht'	=> true,
												'duplikaat' => false],
											'password' => [
												'display' 	=> "Password",
												'verplicht'	=> true,
												'min' => 6,
												'max' => 15],
										]);
				
				If (1 === 1) {
					// Als de validatie is gelukt wordt de sessie in de database opgeslagen.
					// Het nieuwe lid krijgt een bevestiging van de sussecvolle aanmelding.
					// Ook op het welkomstscherm wordt de gebruiker welkom geheten.
					echo 'In validatie gedeelte';
					//Router::redirect ('');
				} else {
					$data = $validatie->fouten ();
					$this->view->setFouten ($data);
				}
			}
			$this->view->render('register/register');
		}
	}	
?>

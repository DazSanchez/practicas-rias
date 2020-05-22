<?php
    include_once("../models/user.php");

    class UsersService {
        private $userModel;

        function __construct() {
            $this->userModel = new UserModel();
        }

        public function check_credentials($credentials) {
            $user = $this->userModel->get_user_by_username($credentials->username);

            if(!$user) {
                return NULL;
            }

            $hashed_pwd = md5($credentials->password);

            if($user->password != $hashed_pwd) {
                return NULL;
            }

            return $user;
        }
    }
?>
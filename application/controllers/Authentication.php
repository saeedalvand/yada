<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> model("usermodel");

    }

	public function register()
	{
		if(!isset($_GET['username']) || !isset($_GET['version'])|| !isset($_GET['age'])|| !isset($_GET['gender'])|| !isset($_GET['avatar'])|| !isset($_GET['group']) ) // Email is Optional
		{
			echo json_encode("0Invalid parameters. there is at least one missing parameter. please check the API");
		}
		else
		{
			$username   = $this -> input -> get("username");
			$version   = $this -> input -> get("version");
			$age   = $this -> input -> get("age");
			$gender   = $this -> input -> get("gender");
			$avatar   = $this -> input -> get("avatar");
			$group   = $this -> input -> get("group");
			$email = "";
			if(isset($_GET['email']))
			{
				$email = $this -> input -> get("email");
			}

			else
			{

                $userLoginUid = $this  -> createNewLoginUniqueId();
                $uid = $this -> usermodel -> createUser($username, $version,$userLoginUid,$age,$gender,$avatar,$group, $email);
			    if($uid == -1)
			    {
			    	echo json_encode("4Failed to create user");
			    }
			    else
			    {

//			        echo json_encode("5userUniqueId,".$userUniqueID.",username,".$username.",userLoginId,".$userLoginUid.",uid,".$uid); // Success
                    echo "success,".$userLoginUid.",".$uid;
			    }
			}
	    }
	}
    public function updateProfile()
	{
		if(!isset($_GET['username']) || !isset($_GET['loginId']) || !isset($_GET['version'])|| !isset($_GET['age'])|| !isset($_GET['gender'])|| !isset($_GET['avatar'])|| !isset($_GET['group'])|| !isset($_GET['email'])|| !isset($_GET['level']) ) // Email is Optional
		{
			echo json_encode("0Invalid parameters. there is at least one missing parameter. please check the API");
		}
		else
		{
            $username   = $this -> input -> get("username");
            $loginId   = $this -> input -> get("loginId");
            $uid = $this->usermodel->getUserIdFromLogin($loginId);
			$version   = $this -> input -> get("version");
			$age   = $this -> input -> get("age");
			$gender   = $this -> input -> get("gender");
			$avatar   = $this -> input -> get("avatar");
			$group   = $this -> input -> get("group");
			$email = $this -> input -> get("email");
			$level = $this -> input -> get("level");
            if($uid == -1){
                echo json_encode("4Unexisting login id");
                return;
            }
            $ret = $this -> usermodel -> updateUser($username, $version,$age,$gender,$avatar,$group, $email,$level,$uid);
            if($ret != 1)
            {
                echo json_encode("4Failed to update user");
            }
            else
            {
                echo 'success';
            }
	    }
	}

    public function createNewLoginUniqueId(){
        return $this->randomString(4).time().$this->randomString(4);
    }

    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
	//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
	public function checkVersion()
	{
		if(!isset($_GET['version']) || count($_GET) != 1) // Email is Optional
		{
			echo json_encode("0Invalid parameters");
		}
		else
		{

			$versionToCheck = intval($this -> input -> get("version"));

			$mustUpdateVesion = 0;
			$ifYouWantUpdateVersion  = 0;

			$result = "1versionCheck,";

			if($versionToCheck < $mustUpdateVesion && $mustUpdateVesion != 0)
			{

				$result .= "1"; // must Update

				$result .= ",";

				$result .= "0"; // update if you want

			}else if($versionToCheck < $ifYouWantUpdateVersion)
			{

				$result .= "0"; // must Update

				$result .= ",";

				$result .= "1"; // update if you want

			}else
			{
				$result .= "0"; // must Update
				$result .= ",";

				$result .= "0"; // update if you want
			}
			$result .= ",endend";

			echo json_encode($result);
		}
	}
	//
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    public function ping()
    {
    	echo json_encode("1PongPong");
    }

    public function logout()
    {
    	//$this -> session -> sess_destroy();
    	//echo "2Done!";
    }
}

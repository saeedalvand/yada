<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> model("usermodel");
        $this -> load -> model("Gamemodel");
    }
    public function getPlayHistory(){
        if(!isset($_GET['loginId'])|| !isset($_GET['plays']))
        {
            echo json_encode("0Invalid parameters. there is at least one missing parameter. please check the API");
        }
        else
        {
            $loginId   = $this -> input -> get("loginId");
            $plays   = $this -> input -> get("plays");
            $uid = $this->usermodel->getUserIdFromLogin($loginId);
            echo $this->Gamemodel->addHistoryFields($plays,$uid);
        }
    }
    public function getLeaderboard(){
        if(!isset($_GET['loginId']))
        {
            echo json_encode("0Invalid parameters. there is at least one missing parameter. please check the API");
        }
        else
        {
            $loginId   = $this -> input -> get("loginId");
            $uid = $this->usermodel->getUserIdFromLogin($loginId);
            $leaderboard = $this->Gamemodel->getLeaderboard();
            $resultString ="";
            foreach ($leaderboard as $user) {
                foreach ($user as $item) {
                    $resultString.=$item.",";
                }
                $resultString.=$item.";";
            }

            $meAndUp = $this->Gamemodel->getMyRankAndScore($uid);
            foreach ($meAndUp as $mup) {
                if($mup['userid']==$uid)
                    $myPoint = $mup['sum(score)'];
            }
            echo count($meAndUp).",".$myPoint.";";
            echo $resultString;
        }
    }
}

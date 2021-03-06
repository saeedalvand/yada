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
            if(count($meAndUp)==0){
                echo "-1,0;";
            }
            else{
                foreach ($meAndUp as $mup) {
                    if($mup['userid']==$uid){
                        $myPoint = $mup['sum(score)'];
                        echo count($meAndUp).",".$myPoint.";";
                        break;
                    }
                }
            }
            echo $resultString;
        }
    }
    public function sendEndLevelStats(){
        if(!isset($_GET['loginId']) || !isset($_GET['precisionValue'])|| !isset($_GET['perfectionValue'])|| !isset($_GET['punctualityValue'])|| !isset($_GET['presenceValue'])|| !isset($_GET['paceValue'])|| !isset($_GET['step']))
        {
            echo json_encode("0Invalid parameters. there is at least one missing parameter. please check the API");
        }
        else
        {
            $loginId   = $this -> input -> get("loginId");
            $precisionValue   = $this -> input -> get("precisionValue");
            $perfectionValue   = $this -> input -> get("perfectionValue");
            $punctualityValue   = $this -> input -> get("punctualityValue");
            $presenceValue   = $this -> input -> get("presenceValue");
            $paceValue   = $this -> input -> get("paceValue");
            $step   = $this -> input -> get("step");
            $uid = $this->usermodel->getUserIdFromLogin($loginId);
            echo $this->Gamemodel->insertLevelStats($uid,$precisionValue,$perfectionValue,$punctualityValue,$presenceValue,$paceValue,$step);
        }
    }
}
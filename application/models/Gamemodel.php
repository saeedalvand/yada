<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gamemodel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    public function addHistoryFields($plays, $uid)
    {
        $playsArray = explode(";",$plays);
        foreach ($playsArray as $playArray) {
            $playArray = str_replace("#"," ",$playArray);
            $playDetails = explode(",",$playArray);
            $data = array(
                'userId' => $uid,
                'stationId' => $playDetails[0],
                'duration' => $playDetails[1],
                'won' => $playDetails[2],
                'playDateTime' => $playDetails[3],
                'precisionGained' => $playDetails[4],
                'gemsGained' => $playDetails[5],
                'flaws' => $playDetails[6],
                'protectUsed' => $playDetails[7],
                'emoticonUsed' => $playDetails[8],
                'score' => $playDetails[9],
            );
            $result = $this->db->insert('plays', $data);
        }

        if ($result == 1) {
            return 'success';
        } else {
            return -1;
        }

    }

    public function getLeaderboard(){
        $this->db->select("userid, sum(plays.score),name, avatar");
        $this->db->from("plays ");
        $this->db->join("user","user.id = plays.userid");
        $this->db->where("playDateTime > DATE(NOW()) - INTERVAL 7 DAY");
//        $this->db->where("playDateTime >","DATEADD(day,-7, GETDATE()");
        $this->db->group_by("userid");
        $this->db->order_by("sum(plays.score)","desc");
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getMyRankAndScore($uid){
        $this->db->select("userid, sum(score)");
        $this->db->from("plays");
        $this->db->where("playDateTime > DATE(NOW()) - INTERVAL 7 DAY");
        $this->db->group_by("userid");
        $this->db->having("SUM(score)>= (SELECT SUM(score) FROM plays WHERE playDateTime > DATE(NOW()) - INTERVAL 7 DAY and userId = ".$uid.")");
        $query = $this->db->get();
        return $query->result_array();
    }
}
;

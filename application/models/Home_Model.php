<?php

class Home_Model extends CI_Model {

    public function insertDB($table, $dataArray) {
        $this->db->insert($table, $dataArray);
        return true;
    }

    public function updateDB($table, $whereArray, $dataArray) {
        foreach ($whereArray as $field => $value) {
            $this->db->where($field, $value);
        }
        $this->db->update($table, $dataArray);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function simpleSelect($table) {
        $query = $this->db->get($table);
        $Return = $query->result_array();
        if ($Return > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function selectWhere($table, $whereArray) {
        foreach ($whereArray as $field => $value) {
            $this->db->where($field, $value);
        }
        $query = $this->db->get($table);
        $Return = $query->row_array();
        if ($Return > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function deleteWhere($table, $whereArray) {
        foreach ($whereArray as $field => $value) {
            $this->db->where($field, $value);
        }
        return $this->db->delete($table);
    }

    public function countResult($table, $whereArray = '') {
        if ($whereArray) {
            foreach ($whereArray as $field => $value) {
                $this->db->where($field, $value);
            }
        }
        $Return = $this->db->count_all_results($table);
        if ($Return > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function selectWhereResult($table, $whereArray) {
        foreach ($whereArray as $field => $value) {
            $this->db->where($field, $value);
        }
        $query = $this->db->get($table);
        $Return = $query->result_array();
        if ($Return > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function selectLimit($table, $limit) {
        $this->db->limit($limit);
        $query = $this->db->get($table);
        $Return = $query->result_array();
        if ($Return > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function selectLimitWhere($table, $limit, $where, $field, $orderby) {
        $this->db->order_by($field, $orderby);
        $this->db->where($where);
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        $query = $this->db->get($table);
        $Return = $query->result_array();
        if ($Return > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function getListingWithCountry(){
        $query = $this->db->query("SELECT ls.`ls_id`, ls.`ls_name`, c.`c_id`, c.`country_name` FROM `listings` ls
                                    LEFT JOIN `countries` c
                                    ON ls.`ls_countryid` = c.`c_id`");
        $Return = $query->result_array();
        if (count($Return) > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function getCampaignNumberAndCountry(){
        $query = $this->db->query("SELECT c.*, co.`country_name` FROM `campaign_numbers` c
                                    LEFT JOIN countries co
                                    ON c.`fk_countryId` = co.`c_id`");
        $Return = $query->result_array();
        if (count($Return) > 0) {
            return $Return;
        } else {
            return false;
        }
    }
    public function getNumbersCampaignByListing($listId){
        $query = $this->db->query("SELECT cn.`n_id`,cn.`n_number` FROM listings l
                                    INNER JOIN `campaign_numbers` cn
                                    ON l.`ls_countryid` = cn.`fk_countryId`
                                    WHERE l.`ls_id` = '".$listId."'");
        $Return = $query->result_array();
        if (count($Return) > 0) {
            return $Return;
        } else {
            return false;
        }
    }

    public function selectNumbersForCampaign($listId){
        $query = $this->db->query("SELECT l.l_phone FROM lists l
                                    WHERE l.`fk_lsId` = '".$listId."'");
        $Return = $query->result_array();
        if (count($Return) > 0) {
            return $Return;
        } else {
            return false;
        }
    }
    public function getListingsByCountry(){
        $query = $this->db->query("SELECT l.*,c.`country_name` FROM listings l
                                    LEFT JOIN countries c
                                    ON l.`ls_countryid` = c.`c_id`");
        $Return = $query->result_array();
        if (count($Return) > 0) {
            return $Return;
        } else {
            return false;
        }
    }

}

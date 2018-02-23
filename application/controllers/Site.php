<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    if($this->session->userdata('userid')):
	        redirect(base_url().'dashboard.html');
        else:
            $this->load->view('index');
        endif;
	}
    public function error404() {
        $this->load->view('404');
    }
	public function dashboardView(){
        $this->isLogin();
		$data['home_masterview'] = 'dashboard';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function listingView(){
        $this->isLogin();
        $data['countries'] = $this->Home_Model->simpleSelect('countries');
        $data['listings'] = $this->Home_Model->getListingsByCountry();
		$data['home_masterview'] = 'listings';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function countriesView(){
        $this->isLogin();
        $data['countries'] = $this->Home_Model->simpleSelect('countries');
		$data['home_masterview'] = 'countries';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function listView($listId){
        $this->isLogin();
		$data['nav'] = 'listings.html';
        $data['listingData'] = $this->Home_Model->selectWhere('listings',['ls_id'=>decodeData($listId)]);
        $data['listsData'] = $this->Home_Model->selectWhereResult('lists',['fk_lsId'=>decodeData($listId)]);
		$data['home_masterview'] = 'list';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function campaignsView(){
        $this->isLogin();
		$data['campaigns'] = $this->Home_Model->simpleSelect('campaigns');
		$data['home_masterview'] = 'campaigns';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function usersView(){
        $this->isLogin();
		$data['home_masterview'] = 'users';
		$data['users'] = $this->Home_Model->simpleSelect('users');
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function addUsersView($userId=''){
        $this->isLogin();
        if($userId!='')
            $data['userId'] = $userId;
            $data['userdata'] = $this->Home_Model->selectWhere('users',['u_id'=>decodeData($userId)]);
        $data['nav'] = 'users.html';
		$data['home_masterview'] = 'add-users';

        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function addCampaignView($campaignId=''){
        $this->isLogin();
        if($campaignId!='')
            $data['campaignId'] = $campaignId;
            $data['cData'] = $this->Home_Model->selectWhere('campaigns',['c_id'=>decodeData($campaignId)]);
        $data['nav'] = 'campaigns.html';
		$data['home_masterview'] = 'add-campaign';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function sendCampaignView($campaignId=''){
        $this->isLogin();
        $data['sendBit'] = 1;
        $data['campaignId'] = $campaignId;
        $campaignData=$this->Home_Model->selectWhere('campaigns',['c_id'=>decodeData($campaignId)]);
        $data['cData'] = $campaignData;
        $data['listings'] = $this->Home_Model->getListingWithCountry();
        $data['nav'] = 'campaigns.html';
		$data['home_masterview'] = 'add-campaign';
        $this->load->view(HOME_GENERALVIEW, $data);
	}
	public function addCountriesView($countryId=''){
        $this->isLogin();
        if($countryId!='')
            $data['countryId'] = $countryId;
            $data['countrydata'] = $this->Home_Model->selectWhere('countries',['c_id'=>decodeData($countryId)]);
        $data['nav'] = 'countries.html';
        $data['home_masterview'] = 'add-countries';

        $this->load->view(HOME_GENERALVIEW, $data);
    }
    public function campaignNumbersView(){
        $this->isLogin();
        $data['home_masterview'] = 'campaign-numbers';
        $data['cNumdata'] = $this->Home_Model->getCampaignNumberAndCountry();

        $this->load->view(HOME_GENERALVIEW, $data);
    }
    public function addCampaignNumbers($numberId=''){
        $this->isLogin();
        if($numberId!=''):
            $data['numberId'] = $numberId;
            $data['cNumberdata'] = $this->Home_Model->selectWhere('campaign_numbers',['n_id'=>decodeData($numberId)]);
        endif;
        $data['countries'] = $this->Home_Model->simpleSelect('countries');
        $data['nav'] = 'campaign-numbers.html';
        $data['home_masterview'] = 'add-campaign-numbers';

        $this->load->view(HOME_GENERALVIEW, $data);
    }
    public function isLogin() {
        if (!$this->session->userdata('userid')) {
            redirect(base_url());
        }
    }
    public function check_phone($string){
        if (preg_match('/[^0-9\s-+()]/i', $string))
        {
            $this->form_validation->set_message('check_phone', 'Invalid %s');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function get_client_ip_server() {
	    if(ENVIRONMENT=='development'):
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            else:
                if ($_SERVER['HTTP_CLIENT_IP'])
                    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                else if($_SERVER['HTTP_X_FORWARDED_FOR'])
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                else if($_SERVER['HTTP_X_FORWARDED'])
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                else if($_SERVER['HTTP_FORWARDED_FOR'])
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                else if($_SERVER['HTTP_FORWARDED'])
                    $ipaddress = $_SERVER['HTTP_FORWARDED'];
                else if($_SERVER['REMOTE_ADDR'])
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                else
                    $ipaddress = 'UNKNOWN';
        endif;


        return $ipaddress;
    }
    public function submitLogin() {
        $config = array(
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|max_length[100]|xss_clean',
            ),
            array(
                'field' => 'pass',
                'label' => 'password',
                'rules' => 'trim|required|max_length[100]|xss_clean',
            )
        );
        $this->form_validation->set_message('valid_email', 'Invalid %s');
        $this->form_validation->set_message('required', 'Please enter %s');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            if (form_error('email')) {
                echo json_encode(form_error('email'));
            } elseif (form_error('pass')) {
                echo json_encode(form_error('pass'));
            }
        } else {
            $ret = $this->Home_Model->selectWhere('users', array('u_email' => $this->input->post('email'), 'u_pass' => md5($this->input->post('pass'))));

            if(!empty($ret)){
                $this->session->set_userdata('userid',$ret['u_id']);
                $this->session->set_userdata('username',$ret['u_name']);
                $this->session->set_userdata('isadmin',$ret['is_admin']);
                $this->Home_Model->updateDB('users',['u_id'=>$ret['u_id']],['is_login'=>'1', 'last_login'=>date('Y-m-d h:i:s'), 'last_login_ip'=>$this->get_client_ip_server()]);
                $this->session->set_userdata('usertype',$ret['is_admin']);
                echo true;
            } else{
                echo json_encode('Invalid credentials!');
            }
        }
    }
    public function submitUsers() {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required|max_length[255]|xss_clean',
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                //'rules' => 'trim|required|valid_email|max_length[100]|xss_clean|is_unique[users.u_email]',
                'rules' => 'trim|required|valid_email|max_length[100]|xss_clean'.(empty($this->input->post('userId'))?"|is_unique[users.u_email]":""),
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|'.(empty($this->input->post('userId'))?"required|":"").'min_length[6]|max_length[100]|xss_clean',
            ),
            array(
                'field' => 'usertype',
                'label' => 'user rights',
                'rules' => 'trim|required|max_length[1]|xss_clean',
            )
        );
        $this->form_validation->set_message('valid_email', 'Invalid %s');
        $this->form_validation->set_message('required', 'Please enter %s');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            if (form_error('name')) {
                echo json_encode(form_error('name'));
			} elseif (form_error('email')) {
                echo json_encode(form_error('email'));
            } elseif (form_error('password')) {
                echo json_encode(form_error('password'));
            } elseif (form_error('usertype')) {
                echo json_encode(form_error('usertype'));
            }
        } else {
            if(!empty($this->input->post('userId'))):
                if(!empty($this->input->post('password'))):
                    $update = ['u_name'=>$this->input->post('name'), 'u_email'=>$this->input->post('email'), 'u_pass'=>md5($this->input->post('password')) ,'is_admin'=>$this->input->post('usertype')];
                else:
                    $update = ['u_name'=>$this->input->post('name'), 'u_email'=>$this->input->post('email') ,'is_admin'=>$this->input->post('usertype')];
                endif;
                $this->Home_Model->updateDB('users',['u_id'=>decodeData($this->input->post('userId'))],$update);
                echo json_encode('user-updated');
            else:
				$this->Home_Model->insertDB('users',
					[
                        'u_name'=>$this->input->post('name'),
                        'u_email'=>$this->input->post('email'),
                        'u_pass'=>md5($this->input->post('password')),
                        'is_admin'=>$this->input->post('usertype')
					]
				);
				echo json_encode('user-created');
            endif;
        }
    }
    public function validate_plus($code){
        if (strpos($code, '+')!== false)
        {
            $this->form_validation->set_message('validate_plus', 'Please remove + sign, it is already mentioned!');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function submitCountries() {
        $config = array(
            array(
                'field' => 'cName',
                'label' => 'Country Name',
                'rules' => 'trim|required|max_length[255]|xss_clean',
            ),
            array(
                'field' => 'cCode',
                'label' => 'Country Code',
                'rules' => 'trim|required|numeric|max_length[4]|xss_clean|callback_validate_plus',
            ),
            array(
                'field' => 'noLength',
                'label' => 'No. Length',
                'rules' => 'trim|required|numeric|max_length[2]|xss_clean',
            )
        );
        $this->form_validation->set_message('required', 'Please enter %s');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            if (form_error('cName')) {
                echo json_encode(form_error('cName'));
            } elseif (form_error('cCode')) {
                echo json_encode(form_error('cCode'));
            } elseif (form_error('noLength')) {
                echo json_encode(form_error('noLength'));
            }
        } else {
            if(!empty($this->input->post('countryId'))):
                $this->Home_Model->updateDB('countries',['c_id'=>decodeData($this->input->post('countryId'))],
                    [
                        'country_name'=>$this->input->post('cName'),
                        'country_code'=>'+'.$this->input->post('cCode'),
                        'number_length'=>$this->input->post('noLength'),
                        'updatedby'=>$this->session->userdata('userid'),
                        'updatedatetime'=>date("Y-m-d H:i:s")
                    ]
                );
                echo json_encode('country-updated');
            else:
                $this->Home_Model->insertDB('countries',
                    [
                        'country_name'=>$this->input->post('cName'),
                        'country_code'=>'+'.$this->input->post('cCode'),
                        'createdby'=>$this->session->userdata('userid'),
                        'number_length'=>$this->input->post('noLength')
                    ]
                );
                echo json_encode('country-created');
            endif;
        }
    }
    public function deleteUsers(){
        $this->Home_Model->deleteWhere('users',['u_id'=>decodeData($this->input->post('rec-id'))]);
        echo true;
    }
    public function deleteListings(){
        $this->Home_Model->updateDB('campaign_listing',['fk_listing_id'=>decodeData($this->input->post('rec-id'))],['listing_delete'=>'1']);
        $this->Home_Model->deleteWhere('lists',['fk_lsId'=>decodeData($this->input->post('rec-id'))]);
        $this->Home_Model->deleteWhere('listings',['ls_id'=>decodeData($this->input->post('rec-id'))]);
        echo true;
    }
    public function deleteCampaign(){
        $this->Home_Model->updateDB('campaign_listing',['fk_campaign_id'=>decodeData($this->input->post('rec-id'))],['campaign_delete'=>'1']);
        $this->Home_Model->deleteWhere('campaigns',['c_id'=>decodeData($this->input->post('rec-id'))]);
        echo true;
    }
    public function deleteCountries(){
        $this->Home_Model->deleteWhere('countries',['c_id'=>decodeData($this->input->post('rec-id'))]);
        echo true;
    }
    public function deleteCampaignNumbers(){
        $this->Home_Model->deleteWhere('campaign_numbers',['n_id'=>decodeData($this->input->post('rec-id'))]);
        echo true;
    }
    public function submitListing(){
        $listingCountry=$this->Home_Model->selectWhere('countries',['country_name'=>$this->input->post('country')]);
        $config['upload_path']          = './uploads/lists/';
        $config['allowed_types']        = 'csv|CSV|xls|XLS|xlsx';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            echo '<pre>';
            print_r($error);die;
            $this->load->view('upload_form', $error);
        }else{
            $data = $this->upload->data();
            //load the excel library
            $this->load->library('excel');
            $type = PHPExcel_IOFactory::identify('uploads/lists/'.$data['file_name']);
            $objReader = PHPExcel_IOFactory::createReader($type);
            $objPHPExcel = $objReader->load('uploads/lists/'.$data['file_name']);
            $worksheet = $objPHPExcel->getActiveSheet();
            //$rowIterator = $worksheet->getRowIterator();
            $worksheet = $objPHPExcel->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $row = 1;
            $lastColumn = $highestColumn;
            $lastColumn++;
            for ($column = 'A'; $column != $lastColumn; $column++) {
                $cell = $worksheet->getCell($column.$row);
                if($cell=='Phone' || $cell=='phone'){
                    $columnPhoneIndex=$column;
                }
                if($cell=='Name' || $cell=='name'){
                    $columnNameIndex=$column;
                }
            }
            if(empty($columnPhoneIndex)){
                echo 'Please set phone column!';
                die;
            }
            if(empty($columnNameIndex)){
                echo 'Please set name column!';
                die;
            }
            $this->Home_Model->insertDB('listings',['ls_name'=>$this->input->post('listName'),'ls_countryid'=>$listingCountry['c_id'], 'createdby'=>$this->session->userdata('userid')]);
            $lastInsertListingId=$this->db->insert_id();
            $DataArray = [];
            for($a=2;$a<=$highestRow;$a++){
                //$check=$this->validateNumberForListing($worksheet->getCell($columnPhoneIndex.$a)->getValue(),$listingCountry);
                if(is_numeric($worksheet->getCell($columnPhoneIndex.$a)->getValue())){
                    /*echo strlen($worksheet->getCell($columnPhoneIndex.$a)->getValue()).'<br/>';
                    echo 'num_length'.$listingCountry['number_length'].'<br/>';*/
                    if(strlen($worksheet->getCell($columnPhoneIndex.$a)->getValue())==$listingCountry['number_length']):
                        $DataArray[$a]['fk_lsId']=$lastInsertListingId;
                        $DataArray[$a]['l_phone']=trim($worksheet->getCell($columnPhoneIndex.$a)->getValue());
                        $DataArray[$a]['l_name']=trim($worksheet->getCell($columnNameIndex.$a)->getValue());
                    else:
                        $invData[$a]['l_phone']=trim($worksheet->getCell($columnPhoneIndex.$a)->getValue());
                        $invData[$a]['l_name']=trim($worksheet->getCell($columnNameIndex.$a)->getValue());

                    endif;
                }else{
                    $invData[$a]['l_phone']=trim($worksheet->getCell($columnPhoneIndex.$a)->getValue());
                    $invData[$a]['l_name']=trim($worksheet->getCell($columnNameIndex.$a)->getValue());
                }
            }
            if(!empty($DataArray)):
                $this->db->insert_batch('lists', $DataArray);
            else:
                $this->Home_Model->deleteWhere('listings',['ls_id'=>$lastInsertListingId]);
            endif;
            if(file_exists('uploads/lists/'.$data['file_name'])){
                unlink('uploads/lists/'.$data['file_name']);
            }
            if(!empty($invData)){
                $this->session->set_flashdata('invalid_numbers', json_encode($invData));
            }
            $this->session->set_flashdata('success_msg', 'Listing has been created successfully!');
            redirect(base_url().'listings.html');
        }
    }

    public function validateNumberForListing($number,$country){
        /*// Condition for number with country code and plus sign.
        if(strlen($number)==$country['number_length'] && preg_match("/^(\+)*([0-9]+)$/", $number)){
            echo '1';die;
            return $number;
        // Condition if plus sign not in number but country code is there
        }elseif(strlen($number)==($country['number_length']-1)
            && !preg_match("/^(\+)*([0-9]+)$/", $number)
            && str_pos($number,str_replace('+','',$country['country_code']),1))
        {
            echo '2';die;
            return '+'.$number;
        // Condition if plus sign aur country code dono na ho aurrr length exactly utni kam ho jitni sirf country ki kami pe ho
        }elseif(!preg_match("/^(\+)*([0-9]+)$/", $number)
            && !str_pos($number,str_replace('+','',$country['country_code']),1)
            && strlen($number)==($country['number_length']-$country['country_code']))
        {
            echo '3';die;
            return $country['country_code'].$number;
        }
        return false;*/

    }

    public function submitCampaign(){
        $config = array(
            array(
                'field' => 'cName',
                'label' => 'Campaign Name',
                'rules' => 'trim|required|max_length[500]|xss_clean',
            ),
            array(
                'field' => 'cMessage',
                'label' => 'Campaign Message',
                'rules' => 'trim|required|min_length[10]|max_length[1377]|xss_clean',
            )
        );
        $this->form_validation->set_message('required', 'Please enter %s');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            if (form_error('cName')) {
                echo json_encode(form_error('cName'));
            } elseif (form_error('cMessage')) {
                echo json_encode(form_error('cMessage'));
            }
        } else {
            if(!empty($this->input->post('campaignId'))):
                $this->Home_Model->updateDB('campaigns',['c_id'=>decodeData($this->input->post('campaignId'))],['c_name'=>trim($this->input->post('cName')), 'c_body'=>trim($this->input->post('cMessage')), 'updatedby'=>$this->session->userdata('userid'), 'updatedatetime'=>date('Y-m-d H:i:s')]);
                echo json_encode('campaign-updated');
            else:
                $this->Home_Model->insertDB('campaigns',[
                    'c_name'=>$this->input->post('cName'),
                    'c_body'=>$this->input->post('cMessage'),
                    'createdby'=>$this->session->userdata('userid')
                ]);
                echo json_encode('campaign-created');
            endif;
        }
    }
    public function submitSendCampaign(){
        $config = array(
            array(
                'field' => 'cName',
                'label' => 'Campaign Name',
                'rules' => 'trim|required|max_length[500]|xss_clean',
            ),
            array(
                'field' => 'cMessage',
                'label' => 'Campaign Message',
                'rules' => 'trim|required|min_length[10]|max_length[1377]|xss_clean',
            ),
            array(
                'field' => 'listingId',
                'label' => 'Campaign List',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'cNumber',
                'label' => 'Campaign Number',
                'rules' => 'trim|required|xss_clean',
            )
        );
        $this->form_validation->set_message('required', 'Please enter/select %s');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            if (form_error('cName')) {
                echo json_encode(form_error('cName'));
            } elseif (form_error('cMessage')) {
                echo json_encode(form_error('cMessage'));
            } elseif (form_error('listingId')) {
                echo json_encode(form_error('listingId'));
            } elseif (form_error('cNumber')) {
                echo json_encode(form_error('cNumber'));
            }
        } else {
            $listNumbers = $this->Home_Model->selectNumbersForCampaign(decodeData($this->input->post('listingId')));
            if(!empty($listNumbers)){
                $numArray = [];
                foreach ($listNumbers as $lN){
                    array_push($numArray,$lN['l_phone']);
                }
            }
/*
            echo '<pre>';
            print_r($numArray);die;*/
            /*$param = ['fromNumber'=>$this->input->post('cNumber'),'body'=>$this->input->post('cMessage'),'numArray'=>[0=>'+16502763961']];*/
            $param = ['fromNumber'=>$this->input->post('cNumber'),'body'=>$this->input->post('cMessage'),'numArray'=>$numArray];
            $this->load->library('twilio',$param);
            /*echo '<pre>';
            print_r($a);die;*/
            $this->Home_Model->insertDB('campaign_listing',[
                'fk_campaign_id'=>decodeData($this->input->post('campaignId')),
                'fk_listing_id'=>decodeData($this->input->post('listingId')),
                'fk_campaignnumber_id'=>$this->input->post('cNumId'),
                'createdby'=>$this->session->userdata('userid')
            ]);
            echo json_encode('campaign-sent');
        }
    }
    public function submitCampaignNumbers(){
        $config = array(
            array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'trim|required|xss_clean',
            ),
            array(
                'field' => 'cNumber',
                'label' => 'Campaign Number',
                'rules' => 'trim|required|max_length[20]|callback_check_phone|xss_clean',
            )
        );
        $this->form_validation->set_message('required', 'Please enter %s');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            if (form_error('country')) {
                echo json_encode(form_error('country'));
            } elseif (form_error('cNumber')) {
                echo json_encode(form_error('cNumber'));
            }
        } else {
            if(!empty($this->input->post('numberId'))):
                $this->Home_Model->updateDB('campaign_numbers',['n_id'=>decodeData($this->input->post('numberId'))],
                    [
                        'fk_countryId'=>$this->input->post('country'),
                        'n_number'=>$this->input->post('cNumber'),
                        'updatedby'=>$this->session->userdata('userid'),
                        'updatedatetime'=>date("Y-m-d H:i:s")
                    ]
                );
                echo json_encode('cnumber-updated');
            else:
                $this->Home_Model->insertDB('campaign_numbers',
                    [
                        'fk_countryId'=>$this->input->post('country'),
                        'n_number'=>$this->input->post('cNumber'),
                        'createdby'=>$this->session->userdata('userid')
                    ]
                );
                echo json_encode('cnumber-created');
            endif;
        }
    }
    public function getNumbersCampaignByListing(){
        $r=$this->Home_Model->getNumbersCampaignByListing(decodeData($this->input->post('listingId')));
        echo (!empty($r)?json_encode($r):'');
    }

    public function logOut() {
        $this->Home_Model->updateDB('users',['u_id'=>$this->session->userdata('userid')],['is_login'=>'0']);
        $this->session->unset_userdata('userid');
        redirect(base_url());
    }
}
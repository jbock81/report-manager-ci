<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_report extends CI_Controller {

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

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("yuja_api");
    }

	public function index()
	{
        
    }
    
    public function get_all_groups()
    {
        $url = "https://tiffin.yuja.com/services/groups";
        $params = array();
        $method = "GET";

        $result = call_api($url, $params, $method);
        
        $group_id_reports = array(array());
        $k = 0;
        foreach ($result as $item)
        {
            $group_id_reports[$k]["publish_type"] = isset($item->publish_type) ? $item->publish_type : "";
            $group_id_reports[$k]["group_code"] = isset($item->group_code) ? $item->group_code : "";
            $group_id_reports[$k]["group_id"] = isset($item->group_id) ? $item->group_id : "";
            $group_id_reports[$k]["group_name"] = isset($item->group_name) ? $item->group_name : "";
            $group_id_reports[$k]["owner_id"] = isset($item->owner_id) ? $item->owner_id : "";
            $group_id_reports[$k]["group_security"] = isset($item->group_security) ? $item->group_security : "";
            $group_id_reports[$k]["group_term"] = isset($item->group_term) ? $item->group_term : "";
            $group_id_reports[$k]["is_active"] = isset($item->is_active) && $item->is_active == 1 ? "true" : "false";
            $k++;
        }

        if (count($group_id_reports[0]) == 0)
            $group_id_reports = array();

        $data['group_id_reports'] = $group_id_reports;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('group_report/group_id_report.php', $data);
        $this->load->view('inc/footer.php');
    }

    public function get_content_owners_by_group()
    {
        $url = "https://tiffin.yuja.com/services/groups";
        $params = array(array());
        $method = "GET";
        $groups = call_api($url, $params, $method);

        $content_owners = array(array());
        $k=0;

        foreach ($groups as $group)
        {
            $group_id = isset($group->group_id) ? $group->group_id : "";
            $url2 = "https://tiffin.yuja.com/services/groups/" . $group_id . "/content_owners";
            $result = call_api($url2, $params, $method);
            foreach ($result as $item)
            {
                $content_owners[$k]["group_id"] = $group_id;
                $content_owners[$k]["login_id"] = isset($item->login_id) ? $item->login_id : "";
                $content_owners[$k]["email_address"] = isset($item->email_address) ? $item->email_address : "";
                $content_owners[$k]["user_type"] = isset($item->user_type) ? $item->user_type : "";
                $content_owners[$k]["user_id"] = isset($item->user_id) ? $item->user_id : "";
                $content_owners[$k]["timezone"] = isset($item->timezone) ? $item->timezone : "";
                $content_owners[$k]["custom_id"] = isset($item->custom_id) ? $item->custom_id : "";
                $content_owners[$k]["last_name"] = isset($item->last_name) ? $item->last_name : "";
                $content_owners[$k]["phone_number"] = isset($item->phone_number) ? $item->phone_number : "";
                $content_owners[$k]["first_name"] = isset($item->first_name) ? $item->first_name : "";
                $k++;
            }
        }

        if (count($content_owners[0]) == 0)
            $content_owners = array();
        
        $data['content_owners'] = $content_owners;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('group_report/content_owners_report.php', $data);
        $this->load->view('inc/footer.php');
    }

    public function get_members_by_group()
    {
        $url = "https://tiffin.yuja.com/services/groups";
        $params = array(array());
        $method = "GET";
        $groups = call_api($url, $params, $method);

        $members = array(array());
        $k=0;

        foreach ($groups as $group)
        {
            $group_id = isset($group->group_id) ? $group->group_id : "";
            $url2 = "https://tiffin.yuja.com/services/groups/" . $group_id . "/members";
            $result = call_api($url2, $params, $method);
            foreach ($result as $item)
            {
                $members[$k]["group_id"] = $group_id;
                $members[$k]["login_id"] = isset($item->login_id) ? $item->login_id : "";
                $members[$k]["email_address"] = isset($item->email_address) ? $item->email_address : "";
                $members[$k]["user_type"] = isset($item->user_type) ? $item->user_type : "";
                $members[$k]["user_id"] = isset($item->user_id) ? $item->user_id : "";
                $members[$k]["timezone"] = isset($item->timezone) ? $item->timezone : "";
                $members[$k]["custom_id"] = isset($item->custom_id) ? $item->custom_id : "";
                $members[$k]["last_name"] = isset($item->last_name) ? $item->last_name : "";
                $members[$k]["phone_number"] = isset($item->phone_number) ? $item->phone_number : "";
                $members[$k]["first_name"] = isset($item->first_name) ? $item->first_name : "";
                $k++;
            }
        }
        
        if (count($members[0]) == 0)
            $members = array();
        
        $data['members'] = $members;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('group_report/members_report.php', $data);
        $this->load->view('inc/footer.php');
    }
}

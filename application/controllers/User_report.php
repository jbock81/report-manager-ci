<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_report extends CI_Controller {

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

    public function get_all_users()
    {
        $url = "https://tiffin.yuja.com/services/users";
        $params = array();
        $method = "GET";

        $result = call_api($url, $params, $method);

        $course_id_reports = array(array());

        $k = 0;
        foreach ($result as $item)
        {
            $course_id_reports[$k]["login_id"] = isset($item->login_id) ? $item->login_id : "";
            $course_id_reports[$k]["email_address"] = isset($item->email_address) ? $item->email_address : "";
            $course_id_reports[$k]["user_type"] = isset($item->user_type) ? $item->user_type : "";
            $course_id_reports[$k]["user_id"] = isset($item->user_id) ? $item->user_id : "";
            $course_id_reports[$k]["timezone"] = isset($item->timezone) ? $item->timezone : "";
            $course_id_reports[$k]["custom_id"] = isset($item->custom_id) ? $item->custom_id : "";
            $course_id_reports[$k]["last_name"] = isset($item->last_name) ? $item->last_name : "";
            $course_id_reports[$k]["phone_number"] = isset($item->phone_number) ? $item->phone_number : "";
            $course_id_reports[$k]["first_name"] = isset($item->first_name) ? $item->first_name : "";
            $k++;
        }
        if (count($course_id_reports[0]) == 0)
            $course_id_reports = array();
        
        $data['course_id_reports'] = $course_id_reports;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('user_report/user_id_report.php', $data);
        $this->load->view('inc/footer.php');
    }

    public function get_content_owners_by_user()
    {
        $url = "https://tiffin.yuja.com/services/users";
        $params = array(array());
        $method = "GET";
        $users = call_api($url, $params, $method);

        $content_owners = array(array());
        $k=0;

        foreach ($users as $user)
        {
            $user_id = isset($user->user_id) ? $user->user_id : "";
            $url2 = "https://tiffin.yuja.com/services/users/" . $user_id . "/groups/content_owners";
            $result = call_api($url2, $params, $method);
            foreach ($result as $item)
            {
                $content_owners[$k]["user_id"] = $user_id;
                $content_owners[$k]["publish_type"] = isset($item->publish_type) ? $item->publish_type : "";
                $content_owners[$k]["group_code"] = isset($item->group_code) ? $item->group_code : "";
                $content_owners[$k]["group_id"] = isset($item->group_id) ? $item->group_id : "";
                $content_owners[$k]["group_name"] = isset($item->group_name) ? $item->group_name : "";
                $content_owners[$k]["owner_id"] = isset($item->owner_id) ? $item->owner_id : "";
                $content_owners[$k]["group_security"] = isset($item->group_security) ? $item->group_security : "";
                $content_owners[$k]["group_term"] = isset($item->group_term) ? $item->group_term : "";
                $content_owners[$k]["is_active"] = isset($item->is_active) && $item->is_active == 1 ? "true" : "false";
                $k++;
            }
        }
        if (count($content_owners[0]) == 0)
            $content_owners = array();
        
        $data['content_owners'] = $content_owners;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('user_report/content_owners_report.php', $data);
        $this->load->view('inc/footer.php');
    }

    public function get_courses_by_user()
    {
        $url = "https://tiffin.yuja.com/services/users";
        $params = array(array());
        $method = "GET";
        $users = call_api($url, $params, $method);

        $courses = array(array());
        $k=0;

        foreach ($users as $user)
        {
            $user_id = isset($user->user_id) ? $user->user_id : "";
            $url2 = "https://tiffin.yuja.com/services/users/" . $user_id . "/groups/content_owners";
            $result = call_api($url2, $params, $method);
            foreach ($result as $item)
            {
                $courses[$k]["user_id"] = $user_id;
                $courses[$k]["publish_type"] = isset($item->publish_type) ? $item->publish_type : "";
                $courses[$k]["group_code"] = isset($item->group_code) ? $item->group_code : "";
                $courses[$k]["group_id"] = isset($item->group_id) ? $item->group_id : "";
                $courses[$k]["group_name"] = isset($item->group_name) ? $item->group_name : "";
                $courses[$k]["owner_id"] = isset($item->owner_id) ? $item->owner_id : "";
                $courses[$k]["group_security"] = isset($item->group_security) ? $item->group_security : "";
                $courses[$k]["group_term"] = isset($item->group_term) ? $item->group_term : "";
                $courses[$k]["is_active"] = isset($item->is_active) && $item->is_active == 1 ? "true" : "false";
                $k++;
            }
        }
        if (count($courses[0]) == 0)
            $courses = array();

        $data['courses'] = $courses;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('user_report/courses_report.php', $data);
        $this->load->view('inc/footer.php');
        
    }

}
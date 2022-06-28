<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_report extends CI_Controller {

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

    public function get_videoview_by_group()
    {
        $url = "https://tiffin.yuja.com/services/groups";
        $params = array(array());
        $method = "GET";
        $groups = call_api($url, $params, $method);

        $videoviews = array(array());
        $k=0;

        foreach ($groups as $group)
        {
            $group_id = isset($group->group_id) ? $group->group_id : "";
            $url2 = "https://tiffin.yuja.com/report/videoview/" . $group_id;
            $result = call_api2($url2, $params, $method);
            $videoviews[$k]["group_id"] = $group_id;
            $videoviews[$k]["videoview"] = $result;
        }

        if (count($videoviews[0]) == 0)
            $videoviews = array();

        $data['videoviews'] = $videoviews;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('analytics_report/videoview_report.php', $data);
        $this->load->view('inc/footer.php');
    }

    public function getVisitors()
    {
        $url = "https://tiffin.yuja.com/report/visitors";
        $params = array();
        $method = "GET";

        $result = call_api2($url, $params, $method);

        $data['visitors'] = $result;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('analytics_report/visitors_report.php', $data);
        $this->load->view('inc/footer.php');
    }    

}
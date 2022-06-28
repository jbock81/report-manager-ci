<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_report extends CI_Controller {

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

    public function get_all_devices()
    {
        $url = "https://tiffin.yuja.com/services/devices";
        $params = array();
        $method = "GET";

        $result = call_api($url, $params, $method);
        
        $device_reports = array(array());
        $k = 0;
        foreach ($result as $item)
        {
            $device_reports[$k]["station_name"] = isset($item->station_name) ? $item->station_name : "";
            $device_reports[$k]["access_level"] = isset($item->access_level) ? $item->access_level : "";
            $device_reports[$k]["device_id"] = isset($item->device_id) ? $item->device_id : "";
            $device_reports[$k]["access_id"] = isset($item->access_id) ? $item->access_id : "";
            $device_reports[$k]["station_type"] = isset($item->station_type) ? $item->station_type : "";
            $k++;
        }
        if (count($device_reports[0]) == 0)
            $device_reports = array();
        
        $data['device_reports'] = $device_reports;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('device_report/device_id_report.php', $data);
        $this->load->view('inc/footer.php');
    }

    public function get_schedules_by_device()
    {
        $url = "https://tiffin.yuja.com/services/devices";
        $params = array(array());
        $method = "GET";
        $devices = call_api($url, $params, $method);

        $device_schedules = array(array());
        $k=0;
        $startTime = $this->config->item("DEVICE_SCHEDULE_START_TIME");
        $endTime = $this->config->item("DEVICE_SCHEDULE_END_TIME");

        foreach ($devices as $device)
        {
            $device_id = isset($device->device_id) ? $device->device_id : "";
            $url2 = "https://tiffin.yuja.com/services/devices/" . $device_id . "/schedule?startTime=" . $startTime . "&endTime=" . $endTime;
            $result = call_api($url2, $params, $method);
            foreach ($result as $item)
            {
                $device_schedules[$k]["device_id"] = $device_id;
                $device_schedules[$k]["duration"] = isset($item->duration) ? $item->duration : "";
                $device_schedules[$k]["session_name"] = isset($item->session_name) ? $item->session_name : "";
                $device_schedules[$k]["session_creator"] = isset($item->session_creator) ? $item->session_creator : "";
                $device_schedules[$k]["repeat_summary"] = isset($item->repeat_summary) ? $item->repeat_summary : "";
                $device_schedules[$k]["device_profile"] = isset($item->device_profile) ? $item->device_profile : "";
                $device_schedules[$k]["session_id"] = isset($item->session_id) ? $item->session_id : "";
                $device_schedules[$k]["class_name"] = isset($item->class_name) ? $item->class_name : "";
                $device_schedules[$k]["class_code"] = isset($item->class_code) ? $item->class_code : "";
                $device_schedules[$k]["video_id"] = isset($item->video_id) ? $item->video_id : "";
                $k++;
            }
        }

        if (count($device_schedules[0]) == 0)
            $device_schedules = array();
        
        $data['device_schedules'] = $device_schedules;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('device_report/device_schedule_report.php', $data);
        $this->load->view('inc/footer.php');
    }

}
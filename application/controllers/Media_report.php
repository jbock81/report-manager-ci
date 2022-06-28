<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_report extends CI_Controller {

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

    public function get_videos_by_course()
    {
        $url = "https://tiffin.yuja.com/services/groups";
        $params = array(array());
        $method = "GET";
        $groups = call_api($url, $params, $method);

        $course_videos = array(array());
        $k=0;
        
        foreach ($groups as $group)
        {
            $group_id = isset($group->group_id) ? $group->group_id : "";
            $group_name = isset($group->group_name) ? $group->group_name : "";
            $url2 = "https://tiffin.yuja.com/services/media/video/group/" . $group_id;
            $result = call_api($url2, $params, $method);
            if (!is_null($result))
            {
            foreach ($result as $item)
            {
                $video_id = isset($item->video_id) ? $item->video_id : "";
                $description = isset($item->description) ? $item->description : "";
                $title = isset($item->title) ? $item->title : "";
                $url3 = "https://tiffin.yuja.com/services/media/video/directlink/" . $video_id;
                $result2 = call_api($url3, $params, $method);
                if (!is_null($result2))
                {
                    $course_videos[$k]["group_id"] = $group_id;
                    $course_videos[$k]["group_name"] = $group_name;
                    $course_videos[$k]["video_id"] = $video_id;
                    $course_videos[$k]["title"] = $title;
                    $course_videos[$k]["description"] = $description;
                    $course_videos[$k]["directlink"] = isset($result2->directlink) ? $result2->directlink : "";
                    $course_videos[$k]["embedcode"] = isset($result2->embedcode) ? $result2->embedcode : "";
                    $k++;
                }
            }
            }
        }

        if (count($course_videos[0]) == 0)
            $course_videos = array();

        $data['course_videos'] = $course_videos;

        $this->load->view('inc/header.php');
        $this->load->view('inc/navbar.php');
        $this->load->view('media_report/course_video_report.php', $data);
        $this->load->view('inc/footer.php');
    }

}
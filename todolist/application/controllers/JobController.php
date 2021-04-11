<?php
class JobController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JobModel');
	}
	public function index()
	{
		$this->read();
	}
	public function read()
	{
		$jobList = $this->JobModel->read();
		// $data['jobList'] = $jobList;
		// $object['controller'] = $this;
		$data = array(
			'jobList' => $jobList,
			'controller' => $this
		);
		$this->load->view('JobView', $data);
	}
	public function insert()
	{
		$jobName = $this->input->post('jobName');
		$jobType = $this->input->post('jobType');
		$data = 
		array(
        	'job_name' => $jobName,
        	'job_startdate' => '0000-00-00',
        	'job_enddate' => '0000-00-00',
        	'job_finishdate' => '0000-00-00',
        	'job_type' => $jobType,
        	'nv_id' => 1,
        	'job_status' => 0
    	);

    	$jobList = $this->JobModel->insert($data);
	}
	public function delete()
	{
		$jobId = $this->input->post('jobId');
		$this->JobModel->delete($jobId);
	}
	public static function formatEnddate($endDate, $status)
	{
		$date = getdate();
		$day = $date['year']."-".$date['mon']."-".$date['mday'];
		$today = strtotime($day);
		$end = strtotime($endDate);
		if($endDate != '0000-00-00')
        {
        	if($status == 0)//neu chua lam xong
        	{
        	if($end >= $today)//ngay het han chua toi
        	{
            	echo 
            	'<div style="font-weight:bold;">
            	<img src="'
            	.base_url("assets/img/icons8-time-machine-15.png").
            	'" style="padding-right:3px;">'
            	.$endDate.
            	'</div>';
        	} else if($end < $today)//ngay het han truoc ngay hom nay
        	{
        		echo 
            	'<div style="font-weight:bold; color:red;">
            	<img src="'
            	.base_url("assets/img/icons8-time-machine-15.png").
            	'" style="padding-right:3px;">'
            	.$endDate.
            	'</div>';
        	}
        	} else //neu da lam xong
        	{
        		echo 
            	'<div style="font-weight:bold; color:blue;">
            	<img src="'
            	.base_url("assets/img/icons8-time-machine-15.png").
            	'" style="padding-right:3px;">'
            	.$endDate.
            	'</div>';
        	}
        } 
	}
	public function updateStatus()
	{
		$jobId = $this->input->post('jobId');
		$status = $this->input->post('status');

		$this->JobModel->updateStatus($jobId, $status);
	}
}
?>

<?php
class JobModel extends CI_Model
{
	public function read()
	{
		$query = $this->db->query("SELECT * from todo_job, todo_nhanvien WHERE todo_job.nv_id = todo_nhanvien.nv_id");
		return $query->result_array();
	}

	public function insert($job)
	{
		$query = $this->db->insert('todo_job', $job);
	}

	public function delete($id)
	{
		$this->db->query("delete from todo_job where job_id = ".$id);
	}
	public function updateStatus($id, $status)
	{
		$this->db->query("update todo_job set job_status = ".$status." where job_id = ".$id);
	}
}
?>
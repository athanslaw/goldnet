<?php
class alert_mdl extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function alertchangestatus($id = "")
	{
		$query1 = $this->db->where('id', $id);
		$query1 = $this->db->update('alert', array('status' =>1));
		return "";
	}
	
	public function alertchangestatusgroup()
	{if($this->input->post('alert_id')!=null){
		foreach($this->input->post('alert_id') as $id){
			$query1 = $this->db->where('id', $id);
			$query1 = $this->db->update('alert', array('status' =>1));
		}
		return "";
	}}
	
	public function alertdeletegroup()
	{if($this->input->post('alert_id')!=null){
		foreach($this->input->post('alert_id') as $id){
			$this->db->where('id', $id);
			$this->db->delete('alert');
		}
		return "<div class='alert alert-success'>Alerts Successfully Deleted</div>";
	}}

	public function deletealert($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('alert');
		
		return "<div class='alert alert-success'>Alert Successfully Deleted</div>";
	}
	
	public function send_alert($recipient_id="", $content="", $link="", $status="")
	{
		$data1 = array('recipient_id' => $recipient_id, 'content' => $content, 'link' => $link, 'status' => $status);
		$query = $this->db->insert("alert", $data1);
					
		$contents = '<table border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>
			<table border="0" cellspacing="0" style="width:80%">
				<tbody>
					<tr>
						<td>
						<p><strong>Hello,</strong></p>

						<p>'.$content.'</p>
						<p>&nbsp;</p>

						<p><strong>Regards,</strong><br />
						GoldNet Consult</p>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>';
			
		send_mail("notify@goldnet.com.ng",$contents,"","","Site Notification!");
	}
	
	public function update_alert($link="")
	{
		$query1 = $this->db->where('link', $link);
		$query1 = $this->db->update('alert', array('status' =>1));
	}
	
	public function viewalerts($status="")
	{
        if ($_SESSION['role'] === "admin")
        {
			if($status ===""){
				$query = $this->db->order_by('id DESC');
                $query = $this->db->get('alert');
				return $query->result();
			}else{
				$query = $this->db->order_by('id DESC');
                $query = $this->db->get_where('alert', array('status'=>0));
                return $query->result();
			}
        }
		else{
			if($status ===""){
				$query = $this->db->order_by('id DESC');
				$query = $this->db->get_where('alert', array('recipient_id' => $_SESSION['username']));
				$query = $query->result();
				return $query;
			}else{
				$query = $this->db->order_by('id DESC');
				$query = $this->db->get_where('alert', array('recipient_id' => $_SESSION['username'], 'status'=>0));
				$query = $query->result();
				return $query;
			}
		}
	}
		
}
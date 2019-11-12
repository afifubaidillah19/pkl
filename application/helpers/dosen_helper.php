<?php

function is_dosen()
{
	$ci = get_instance();
	if($ci->session->userdata('user') != 'dosen')
	{
		redirect('authdosen/blocked');
	}
}
<?php

function is_mahasiswa()
{
	$ci = get_instance();
	if($ci->session->userdata('user') != 'mahasiswa')
	{
		redirect('auth/blocked');
	}
}
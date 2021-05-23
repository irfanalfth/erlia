<?php

function view(string $table, array $where, string $field): string
{
    $CI = &get_instance();
    $CI->load->model('Global_model');
    $data = $CI->Global_model->get_data($where, $table, false);
    return $data ? $data[$field] : '';
}

function alert(string $type, string $title, string $description)
{
    $CI = &get_instance();
    return $CI->session->set_flashdata('message', "<script>
				Swal.fire({
						icon: '" . $type . "',
						title: '" . $title . "',
						text: '" . $description . "',
					})
				</script>");
}

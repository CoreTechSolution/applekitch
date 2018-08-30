<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_crop_gd {

	function image_cropping($data){
		$CI =& get_instance();
		$CI->load->library('image_lib');

		$file_name = $data['upload_data']['file_name'];
		$file_path = $data['upload_data']['file_path'];

		$temp = explode(".", $file_name);

		$sizes = $CI->config->item("image_sizes");

		foreach ($sizes as $key => $value) {

			if($value[2] == 'false' ){
				$newfilename = $temp[0].'-'.$value[0].'x'.$value[1].'.'.$temp[1];

				$imgConfig = array();
				$imgConfig['image_library']  = 'gd2';
				$imgConfig['source_image']   = $file_path.$file_name;
				$imgConfig['create_thumb']     = FALSE;
				$imgConfig['maintain_ratio']   = TRUE;
				$imgConfig['new_image']     =  $file_path.$newfilename;
				$imgConfig['width']            = $value[0];
				$imgConfig['height']           = $value[1];

				$CI->image_lib->initialize($imgConfig);
				if (!$CI->image_lib->resize()){
					echo $CI->image_lib->display_errors();
				}

				$CI->image_lib->clear();

				unset($imgConfig);

			}
			elseif($value[2] == 'true' ){
				$newfilename = $temp[0].'-'.$value[0].'x'.$value[1].'.'.$temp[1];

				$imgConfig = array();
				$imgConfig['image_library']= 'gd2';
				$imgConfig['source_image'] = $file_path.$file_name;
				$imgConfig['new_image']    =  $file_path.$newfilename;
				$imgConfig['maintain_ratio'] = false;
				$imgConfig['width']  = $value[0];
				$imgConfig['height'] = $value[1];
				$imgConfig['x_axis'] = 0;
				$imgConfig['y_axis'] = 0;

				$CI->image_lib->initialize($imgConfig);
				if ( ! $CI->image_lib->crop()){
					echo $CI->image_lib->display_errors();
				}
			}
		}
	}

	function show_images($image_id, $preset){
		$CI = &get_instance();
		$CI->load->database();
		$query = $CI->db->query("SELECT * FROM attachment WHERE id = '".$image_id."' ");

		foreach ($query->result() as $row)
		{
			$image_name =  $row->name;
			$image_path =  $row->file_path;
			$root_path =  $row->root_path;
		}

		$sizes = $CI->config->item("image_sizes");

		if($preset == 'full') {
			return $image_path;
		} else {
			$s_name = $sizes[ $preset ];

			$full_img_path = str_replace( $image_name, "", $image_path );

			$temp = explode( ".", $image_name );

			$new_image = $temp[0] . '-' . $s_name[0] . 'x' . $s_name[1] . '.' . $temp[1];

			if ( file_exists( $root_path . $new_image ) ) {
				return $full_img_path . $new_image;
			} else {
				return $image_path;
			}
		}

	}
}
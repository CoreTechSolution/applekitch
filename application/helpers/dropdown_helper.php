<?php
/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 8/16/2018
 * Time: 3:28 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function country_dropdown(){
	$CI = & get_instance();
	$CI->db->select('id,name');
	$CI->db->from('country');
	$list = $CI->db->get();
	$array = array('0'=>'Select Country');
	foreach ($list->result() as $key) {
		$array[$key->id] = $key->name;
	}
	return $array;
}
function subject_dropdown(){
	$CI = & get_instance();
	$CI->db->select('id,name');
	$CI->db->from('subject');
	$list = $CI->db->get();
	$array = array('0'=>'Select Subject');
	foreach ($list->result() as $key) {
		$array[$key->id] = $key->name;
	}
	return $array;
}
function grade_dropdown(){
	$CI = & get_instance();
	$CI->db->select('id,name');
	$CI->db->from('grade');
	$list = $CI->db->get();
	$array = array('0'=>'Select Grade');
	foreach ($list->result() as $key) {
		$array[$key->id] = $key->name;
	}
	return $array;
}
function category_dropdown(){
	$CI = & get_instance();
	$CI->db->select('id,name');
	$CI->db->from('category');
	$list = $CI->db->get();
	$array = array('0'=>'Select Category');
	foreach ($list->result() as $key) {
		$array[$key->id] = $key->name;
	}
	return $array;
}
function topic_dropdown(){
	$CI = & get_instance();
	$CI->db->select('topic_id,topic_name');
	$CI->db->from('topics');
	$list = $CI->db->get();
	$array = array('0'=>'Select Topic');
	foreach ($list->result() as $key) {
		$array[$key->topic_id] = $key->topic_name;
	}
	return $array;
}
<?php
/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 9/4/2018
 * Time: 4:02 PM
 */

class Text_to_speech {
	public function get_speech() {
		$text = substr( $_POST['textbox'], 0, 100 );

		//we are passing as a query string so encode it, space will become +
		$text = urlencode( $text );

		//give a file name and path to store the file
		$file = 'filename';
		$file = "audio/" . $file . ".mp3";

		//now get the content from the Google API using file_get_contents
		$mp3 = file_get_contents( "http://translate.google.com/translate_tts?tl=en&q=$text" );

		//save the mp3 file to the path
		file_put_contents( $file, $mp3 );
	}
}
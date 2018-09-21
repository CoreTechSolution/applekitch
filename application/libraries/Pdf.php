<?php
/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 8/27/2018
 * Time: 3:21 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF in CodeIgniter applications.
 *
 * @package            CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author            Rana

 */

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;


class Pdf
{
	public function __construct(){

		// include autoloader
		require_once FCPATH.'/assets/dompdf2/vendor/autoload.php';
		$options = new Options();
		$options->set('defaultFont', 'Courier');
		$options->set('isRemoteEnabled', TRUE);
		$options->set('debugKeepTemp', TRUE);
		$options->set('isHtml5ParserEnabled', true);
		// instantiate and use the dompdf class
		$pdf = new DOMPDF($options);

		$CI =& get_instance();
		$CI->dompdf = $pdf;
		//$options = new Options();
		//$options->setIsRemoteEnabled(true);
		//$dompdf = new Dompdf($options);

	}
}
?>
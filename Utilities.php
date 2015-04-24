<?php 

/**
 * This is a collection of useful this and thats
 * that will make your life easier in the longrun
 * 
 * @author Nelson Ameyo <nelson@blackpay.co.ke>
 * @version 1.0
 * @license GNU General Public License v2.0
 * @link https://github.com/DeveintLabs/CI-Template-Loader
 * */

/**
 * CodeIgniter disable direct access
 * 
 * Uncomment this line if you are using 
 * this library in CodeIgniter
 * 
 * */
// if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilities
{

	/**
	 * Render Bootstrap Messagebox
	 * 
	 * Generate a full bootstrap message box
	 * with a title, icon, message and close icon
	 * 
	 * @param string $messageString
	 * @param string $title
	 * @param string $cssClass
	 * @param boolean $closeable
	 * 
	 * @return string
	 * */
	public function msgBox($messageString, $title='Information', $cssClass='alert-info', $closeable=true, $icon=true){

		# Fontawesome icons
		if($icon){
			if($cssClass=='alert-error'){ # BS2 hack
				$icon = 'icon-remove-sign';
				$cssClass = 'alert-error alert-danger'; 
			} else if($cssClass=='alert-info') {
				$icon = 'icon-info-sign';
			} else if($cssClass=='alert-success') {
				$icon = 'icon-ok-sign';
			} else if($cssClass=='alert-warning') {
				$icon = 'icon-exclamation-sign';
			} else if($cssClass=='alert-danger') { # BS 2 icon hack
				$icon = 'icon-remove-sign';
			}
		}
		
		$html = null;
		
		$html .= '<div class="alert '.$cssClass.'">';
		if($closeable=='TRUE'){
			$html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		}
		$html .= '<strong><i class="'.@$icon.'"></i> '.$title.'</strong><br>
				'.$messageString.'
				</div>';

		return $html;
	}

	
	/**
	 * Render Bootstrap mini-messagebox
	 * 
	 * Generate a mini bootstrap message box
	 * with a message, icon and close button
	 * 
	 * @param string $messageString
	 * @param string $cssClass
	 * @param boolean $closeable
	 * 
	 * @return string $html
	 * */
	public function miniBox($messageString, $class='alert-info',$closeable=true){

		# Fontawesome icons
		if($class=='alert-error' || $class=='alert-danger'){
			$icon = 'icon-remove-sign';
		} else if($class=='alert-info') {
			$icon = 'icon-info-sign';
		} else if($class=='alert-success') {
			$icon = 'icon-ok-sign';
		} else if($class=='alert-warning') {
			$icon = 'icon-exclamation-sign';
		}

		$html = null;

		$html = '<div class="alert '.$class.' text-center">';

		if($closeable){
			$html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		}

		$html .= '<strong><i class="'.$icon.'"></i></strong>'.$messageString.'</div>';

		return $html;
	}

	/**
	 * Title Case
	 * 
	 * Capitalize every first letter of words 
	 * in a string, with exception of prepositions 
	 * and other user-defined words
	 * 
	 * @param string $string
	 * 
	 * @return string $string
	 * */
	public function titleCase($string){

		$names = explode(' ', $string);

		# Array of words to ignore while changing case
		$prepositions = array(
			'a','an','the','their','our','is'
		);

	    foreach ($names as $key => $value) {
	    	if(!in_array($value, $prepositions)){
	    		$names[$key] = ucfirst(strtolower($value));
	    	}	        
	    }

	    return implode(' ', $names);
	}


	/**
	 * Date/Time formatter
	 * 
	 * Formats a passed in MySQL DateTime string 
	 * to a more readable format. It can also return
	 * the current date/time in multiple formats if 
	 * no input date is specified
	 * 
	 * @param string $outputFormat [TIMESTAMP, READABLE, PROFILE, BLOG]
	 * @param string $dateInput
	 * 
	 * @return string $time
	 * */
	public function formatDate($format='TIMESTAMP',$time=''){

		# Use current time if none isset
		if(empty($time)){
			$time = date('Y-m-d H:i:s');
		}

		if($format == 'TIMESTAMP'){
			$time = date('Y-m-d H:i:s', strtotime($time));
		} else if($format == 'READABLE') {
			$time = date('M j, Y', strtotime($time));
		} else if($format == 'PROFILE') {
			$time = date('l, jS F Y', strtotime($time));
		}  else if($format == 'BLOG') {
			$time = date('F j, Y', strtotime($time));
		}

		# TODO add more formats

		return $time;
	}


	/**
	 * Facebook Time
	 * 
	 * Formats dates from other formats to 
	 * "Facebook format" e.g 2 seconds ago 
	 * or 5 minutes ago
	 * 
	 * @param string $date
	 * @param int $granularity
	 * 
	 * @return string $retVal
	 * 
	 * */
	function fbTime($date, $granularity=1, $format='long') {

	    $date = strtotime($date);
	    $difference = time() - $date;


	    if($format=='long'){
		    $periods = array(
		    	'decade' => 315360000,
		        'year' => 31536000,
		        'month' => 2628000,
		        'week' => 604800, 
		        'day' => 86400,
		        'hour' => 3600,
		        'minute' => 60,
		        'second' => 1
	        );
	    } else if($format=='short'){
	    	$periods = array(
		    	'dec' => 315360000,
		        'yr' => 31536000,
		        'mon' => 2628000,
		        'wk' => 604800, 
		        'day' => 86400,
		        'hr' => 3600,
		        'min' => 60,
		        'sec' => 1
	        );
	    }

	    $retval = '';

	    if ($difference < 5) {
	        $retval = "just now"; # less than 5 secs
	    } else {

	        foreach ($periods as $key => $value) {

	            if ($difference >= $value) {
	                $time = floor($difference/$value);
	                $difference %= $value;
	                $retval .= ($retval ? ' ' : '').$time.' ';
	                $retval .= (($time > 1) ? $key.'s' : $key);
	                $granularity--;
	            }           

	            if ($granularity == '0') { break; }
	        }
        }   
        
        return $retval;  

	}

}

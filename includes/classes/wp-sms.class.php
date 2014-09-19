<?php
/**
 * @category   class
 * @package    WP_SMS
 * @author     Mostafa Soufi <info@mostafa-soufi.ir>
 * @copyright  2014 The Wordpress Bazar Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    1.0
 */
abstract class WP_SMS {

	/**
	 * Webservice username
	 *
	 * @var string
	 */
	public $username;
	
	/**
	 * Webservice password
	 *
	 * @var string
	 */
	public $password;
	
	/**
	 * SMsS send from number
	 *
	 * @var string
	 */
	public $from;
	
	/**
	 * Send SMS to number
	 *
	 * @var string
	 */
	public $to;
	
	/**
	 * SMS text
	 *
	 * @var string
	 */
	public $msg;
	
	/**
	 * Wordpress Database
	 *
	 * @var string
	 */
	protected $db;
	
	/**
	 * Wordpress Table prefix
	 *
	 * @var string
	 */
	protected $tb_prefix;

	/**
		* Custom fields
		*
		* @var array of strings
	*/
	protected $custom_fields;

	/**
		* Custom values
		*
		* @var array of strings
	*/
	public $custom_values;
	
	/**
	 * Constructors
	 */
	public function __construct() {
		
		global $wpdb, $table_prefix;
		
		$this->db = $wpdb;
		$this->tb_prefix = $table_prefix;
		
	}
	
	public function Hook($tag, $arg) {
		do_action($tag, $arg);
	}
	
	public function InsertToDB($sender, $message, $recipient) {
		
		return $this->db->insert(
			$this->tb_prefix . "sms_send",
			array(
				'date'		=>	date('Y-m-d H:i:s' ,current_time('timestamp', 0)),
				'sender'	=>	$sender,
				'message'	=>	$message,
				'recipient'	=>	implode(',', $recipient)
			)
		);

	}

	public function GetCustomFields() {
		return $this->custom_fields;
	}
}

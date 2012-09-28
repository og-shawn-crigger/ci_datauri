<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Data-Images
 *
 * A helper library to assist in on-the-fly creation of DATA-URI images or
 * or fonts in your CSS or even inline use.
 *
 * To use, link to your controller like this inside your CSS or IMG tag or whatever.
 *
 * http://mysite.com/data-images/abc.jpg?path=images
 *
 * Parameters:
 * The following parameters are available for use in the params
 * of the URL.
 *
 * path	- The folder (relative to webroot) that the images can be found in.
 * 			  Optional. Defaults to '/images'.
 *
 * @package    Data-Images
 * @subpackage CodeIgniter
 * @category   Controllers
 * @author     Shawn Crigger < @svizion >
 * @link       http://blog.shawnc.org
 *
 */
class Data_Image extends CI_Controller {

	/**
	 * Simply redirects all calls to the index() method.
	 *
	 * @param string $file The name of the image to return.
	 */
	public function _remap($file=null)
	{
		$this->index($file);
	}//end _remap()

	//--------------------------------------------------------------------

	/**
	 * Performs the image processing based on the parameters provided in the GET request
	 *
	 * @param string $file The name of the image/font to return.
	 */
	public function index($file=null)
	{

		if (empty($file) || !is_string($file))
		{
			show_error('No file to process.');
		}

		$this->output->enable_profiler(FALSE);

		// Get our params
		$path	= $this->input->get('path') ? $this->input->get('path') : '/images';

		$ext = pathinfo($file, PATHINFO_EXTENSION);

		if (empty($ext))
		{
			die('Filename does not include a file extension.');
		}

		$file = FCPATH . $path.'/'.$file;
		$file = str_replace('//', '/',$file);
		$data = 'data: ' . mime_content_type($file);
		$data .= ';base64,' . base64_encode(file_get_contents($file));

		if (!is_file($file))
		{
			die('Image could not be found.');
		}

		$this->output->set_output($data);
	}//end index()

	//--------------------------------------------------------------------

}//end class

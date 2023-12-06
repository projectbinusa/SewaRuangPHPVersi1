<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    /**
     * Get an instance of CodeIgniter
     *
     * @access protected
     * @return object
     */
    protected function ci()
    {
        return get_instance();
    }

    /**
     * Load a CodeIgniter view into domPDF
     *
     * @param string $view The view to load
     * @param array $data The view data
     * @param array $options Dompdf options
     * @return void
     */
    public function load_view($view, $data = array(), $options = array())
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);

        // Check if $options is an array before iterating over it
        if (is_array($options)) {
            // You can set additional options for Dompdf if needed
            foreach ($options as $key => $value) {
                $this->set_option($key, $value);
            }
        } else {
            // Handle the case when $options is not an array
            // You might want to log an error or take appropriate action
            error_log('Invalid $options type in Pdf::load_view');
        }
    }
}

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

        // You can set additional options for Dompdf if needed
        foreach ($options as $key => $value) {
            $this->set_option($key, $value);
        }
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $data['body_content'] = $page;
        $this->load->view('templates/default', $data);
    }
}
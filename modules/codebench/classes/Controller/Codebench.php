<?php

/**
 * Codebench — A benchmarking module.
 *
 * @package    Kohana/Codebench
 * @category   Controllers
 * @author     Kohana Team
 * @copyright  (c) 2009 Kohana Team
 * @license    https://kohana.top/license.html
 */
class Controller_Codebench extends Kohana_Controller_Template
{
    // The codebench view
    public $template = 'codebench';

    public function action_index()
    {
        $class = $this->request->param('class');

        // Convert submitted class name to URI segment
        if (isset($_POST['class'])) {
            throw HTTP_Exception::factory(302)->location('codebench/' . trim($_POST['class']));
        }

        // Pass the class name on to the view
        $this->template->class = (string) $class;

        // Try to load the class, then run it
        if (Kohana::auto_load($class) === true) {
            $codebench = new $class;
            $this->template->codebench = $codebench->run();
        }
    }

}

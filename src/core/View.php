<?php

/**
 * View-specific wrapper.
 * Limits the accessible scope available to templates.
 */
class View{
    /**
     * Template being rendered.
     */
    protected $template;
	
	/**
	 * Directory where the templates are stored
	 */
	protected $directory;

    /**
     * Initialize a new view context.
     */
    public function __construct($template = null) {
		if($template){
	        $this->load($template);
		}
		$this->directory = 'views';
    }
	
	/*
	 * If no template was provided in the constructor, we can still load it here
	 */
	public function load($file){
		$this->template = $this->parseExtension($file);
	}

    /**
     * Safely escape/encode the provided data.
     */
    public function h($data) {
        return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Render the template, returning it's content.
     * @param array $data Data made available to the view.
     * @return string The rendered template.
     */
    public function render($template = false, Array $data = []) {
		if($template){ // last chance to load a template if it wasn't
			$this->template = $this->parseExtension($template);
		}
        extract($data);

        ob_start();
        include( $this->template());
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
	
	public function template($template = false){
		return ($template) ? 
			$this->directory.'/'.$this->parseExtension($template) : 
			$this->directory.'/'.$this->template;
	}
	
	/*
	 * Avoid the need to load the file with the extension
	 */
	private function parseExtension($file){
		return rtrim($file, '.php').'.php'; 
	}
}


<?php 
    class HTMLBuilder {

        protected $header;
        protected $body;
        protected $footer;


        public function __construct($header,$body,$footer) {
            $this->header   = $header;
            $this->body     = $body;
            $this->footer   = $footer;

            $this->buildPage();
        }

        public function buildHeader() {
            $cssDir	    = dirname(dirname(__FILE__)) . '/css/';
            $cssArray	= $this->findFiles($cssDir, 'css');
            $cssLinks	= $this->createCSSLinks($cssArray);

            include 'html/'. $this->header.'.html';
        }   

        public function buildBody() {
            include 'html/'. $this->body.'.html';
        }

        public function buildFooter() {
            $JSDir	    = dirname(dirname(__FILE__)) . '/js/';
            $JSArray	= $this->findFiles($JSDir, 'js');
            $JSLinks	= $this->createJSLinks($JSArray);

            include 'html/'. $this->footer.'.html';
        }

        public function buildPage() {
            $this-> buildHeader();
            $this-> buildBody();
            $this-> buildFooter();
        }

        public function findFiles($dir, $file) {
            return glob($dir . '/*.' . $file);	
        }

        public function createCSSLinks($filesArray) {
            $dumpArray = array();

            foreach ($filesArray as  $file) {
                $fileINFO    = pathinfo($file);
                $fileName    = $fileINFO['basename'];

                $dumpArray[] = '<link rel="stylesheet" type = text/css href="css/' . $fileName. '">';
            }

            return implode('', $dumpArray);
        }

        public function createJSLinks($filesArray) {
            $dumpArray = array();

            foreach ($filesArray as  $file) {
                $fileINFO    = pathinfo($file);
                $fileName    = $fileINFO['basename'];

                $dumpArray[] = '<script src="js/' . $fileName . '"></script>';
            }

            return implode('', $dumpArray);
        }

    }
?>
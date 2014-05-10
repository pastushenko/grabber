<?php
include(BASEDIR.DS.'vendor'.DS.'phpQuery'.DS.'phpQuery-onefile.php');

abstract Class GrabberAbstract
{
    /** @var string  */
    private $url;
    /** @var phpQueryObject */
    private $document;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $page = $this->getPage($url);
        $this->document = phpQuery::newDocument($page);

    }

    protected function selectCurrentDocument()
    {
        phpQuery::selectDocument($this->document);
    }
    /**
     * @param string $url
     * @return string html page
     */
    private function getPage($url)
    {
        $opts = array(
            'http' => array(
                'method'=>"GET",
                'header'=>"Content-Type: text/html; charset=utf-8"
            )
        );

        $context = stream_context_create($opts);
        $result = @file_get_contents($url, false, $context);
        return $result;
    }

    protected function getFirstNode($selector) {
        $this->selectCurrentDocument();
        $nodes = pq($selector);
        foreach($nodes as $node) {
            return $node;
        }
    }

}
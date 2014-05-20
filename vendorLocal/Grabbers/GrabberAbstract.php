<?php
namespace vendorLocal\Grabbers;

abstract Class GrabberAbstract
{
    /** @var string  */
    private $url;
    /** @var \phpQueryObject */
    private $document;

    /**
     * @param string $page
     * @return string ut8 string
     */
    abstract function toUtf8($page);

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $page = $this->getPage($url);
        $this->document = \phpQuery::newDocument($page);
    }

    protected function selectCurrentDocument()
    {
        if (\phpQuery::getDocument() != $this->document) {
            \phpQuery::selectDocument($this->document);
        }
    }

    /**
     * @param string $url
     * @return string html page
     */
    private function getPage($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: text/html; charset=utf-8"
        ));
        $result = curl_exec($ch);
        curl_close($ch);

        return $this->toUtf8($result);
    }

    /**
     * @param string $selector
     * @return \DOMElement
     */
    protected function getFirstNode($selector) {
        $this->selectCurrentDocument();
        $nodes = pq($selector);
        foreach($nodes as $node) {
            return $node;
        }

        return null;
    }

    /**
     * @param string $selector
     * @param string $attributeName
     * @return \DOMElement[]
     */
    protected function getElementsAttributeBySelector($selector, $attributeName)
    {
        $elements = $this->getElementsBySelector($selector);
        $elementsAttribute = [];
        foreach($elements as $element) {
            $elementsAttribute[] = $element->getAttribute($attributeName);
        }
        return $elementsAttribute;
    }

    /**
     * @param string $selector
     * @return \DOMElement[]
     */
    private function getElementsBySelector($selector)
    {
        $this->selectCurrentDocument();

        $elements = [];
        /** @var \DOMElement $element */
        foreach(pq($selector) as $element) {
            $elements[] = $element;
        }
        return $elements;
    }
}
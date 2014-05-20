<?php
namespace vendorLocal\Grabbers\PostScience;

use vendorLocal\Entity\Page;
use vendorLocal\Interfaces\PagesGrabberInterface;

class PostScienceGrabber implements PagesGrabberInterface
{
    /** @var PostSciencePageRepository */
    private $pageRepository;
    public function __construct()
    {
        $this->pageRepository = new PostSciencePageRepository();
    }

    public function getAllPages()
    {
        $allPages = [];
        $primaryPages = $this->pageRepository->getStartPages();
        foreach($primaryPages as $primaryPage) {

            $categoryPages = $this->getCategoryPages($primaryPage);
            $allPages = array_merge($allPages, $categoryPages);

            echo 'Grabbed - ' . $primaryPage->getCategory() . ' (' . (count($categoryPages) + 1) . ' pages)' . PHP_EOL;
        }
        return $allPages;
    }

    /**
     * @param Page[] $pages
     */
    public function savePages($pages)
    {
        foreach($pages as $page) {
            $this->pageRepository->insert($page);
        }
    }

    /**
     * @param Page $primaryPage
     * @return Page[]
     */
    private function getCategoryPages(Page $primaryPage)
    {
        $pagesGrabber = new PostSciencePagesGrabber($primaryPage->getUrl());
        $internalPages = $pagesGrabber->getInternalPages($primaryPage);
        $internalPages[] = $primaryPage;

        return $internalPages;
    }
} 
<?php
namespace vendorLocal\Grabbers\PostScience;

use vendor\storage\Storage;
use vendorLocal\Entity\Page;

class PostSciencePageRepository extends Storage
{
    private $startPagesUrls = [
        'video' => 'http://postnauka.ru/video',
        'tv' => 'http://postnauka.ru/tv',
        'lectures' => 'http://postnauka.ru/lectures',
        'longreads' => 'http://postnauka.ru/longreads',
        'books' => 'http://postnauka.ru/books',
        'talks' => 'http://postnauka.ru/talks',
        'faq' => 'http://postnauka.ru/faq',
        'courses' => 'http://postnauka.ru/courses',
        'projects' => 'http://postnauka.ru/projects',
        'guides' => 'http://postnauka.ru/guides',
        'popular' => 'http://postnauka.ru/popular'
    ];

    /** @var Page[] */
    private $startPages = [];

    protected function getCollectionName()
    {
        return 'postSciencePages';
    }

    /**
     * @return Page[]
     */
    public function getStartPages()
    {
        if (empty($startPages)) {
            foreach($this->startPagesUrls as $category => $url) {
                $page = new Page($url);
                $page->setCategory($category);
                $this->startPages[] = $page;
            }
        }

        return $this->startPages;
    }
} 
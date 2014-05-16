<?php
namespace vendorLocal\PostScience;

class PostScienceGrabberRepository
{
    private $startPages = [
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

    /**
     * @return mixed
     */
    public function getStartPages()
    {
        return $this->startPages;
    }
} 
<?php
/**
 * User: Murad Shukurlu
 * Date: 1/26/2019
 * Time: 10:00 PM
 */

namespace Blogable\Repository;


class SearchRepository
{
    protected  $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getResults($keyword)
    {
       $results =  $this->blogRepository->search_blogable($keyword);

       return $results;
    }


}
<?php
namespace Domain\Blog\UserCase;

use Assert\Assert;
use Assert\LazyAssertionException;
use DateTimeInterface;
use Domain\Blog\Entity\Post;
use Domain\Blog\Exception\InvalidPostDataException;
use Domain\Blog\Port\PostRepositoryInterface;

class CreatePost{
    protected PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $repository)
    {
        $this->postRepository = $repository;
    }
    public function execute(array $postData): ?Post{
        $post = new Post(
            $postData['title'] ?? '',
            $postData['content'] ?? '',
            $postData['publishedAt'] ?? null
        );
        
        try{
            $this->validate($post);
            $this->postRepository->save($post);
            return $post;
        }catch(LazyAssertionException $e)
        {
            throw new InvalidPostDataException($e->getMessage());
        }
    }
    protected function validate(Post $post)
    {
        Assert::lazy()->that($post->title)->notBlank()->minLength(3)
              ->that($post->content)->notBlank()->minLength(10)
              ->that($post->publishedAt)->nullOr()->isInstanceOf(DateTimeInterface::class)
              ->verifyNow();
    }
    
}
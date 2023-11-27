<?php

use Domain\Blog\Entity\Post;
use Domain\Blog\Exception\InvalidPostDataException;
use Domain\Blog\Test\Adapters\InMemoryPostRepository;
use Domain\Blog\UserCase\CreatePost;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it("should create a post", function(){
    $repository = new InMemoryPostRepository;
    
    $userCase = new CreatePost($repository);

    $post = $userCase->execute([
        'title' => 'Mon titre',
        'content' => 'Mon contenu',
        'publishedAt' => new DateTime('2023-01-01 20:30:00')
    ]);

    assertInstanceOf(Post::class, $post);
    assertEquals($post, $repository->findOne($post->uuid));
});

it("should trow a InvalidPostDataException if bad data is provided", function($postData){
    $repository = new InMemoryPostRepository;
    
    $userCase = new CreatePost($repository);

    $post = $userCase->execute($postData);

})->with([
    [['title' => 'mon titre', 'publishedAt' => new DateTime('2023-01-01')]],
    [['publishedAt' => new DateTime('2023-01-01')]],
    [[]]
])->throws(InvalidPostDataException::class);
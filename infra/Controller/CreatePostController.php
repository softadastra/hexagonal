<?php
namespace App\Controller;

use DateTime;
use Domain\Blog\UserCase\CreatePost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class CreatePostController{
    protected CreatePost $usercase;
    public function __construct(CreatePost $usercase)
    {
        $this->usercase = $usercase;
    }
    public function handleRequest(Request $request)
    {
        if($request->isMethod('GET'))
        {
            //montrer le formulaire
            ob_start();
            include __DIR__ . '/../templates/form.html.php';
            return new Response(ob_get_clean());

        }
        //traiter le formulaire en appelant le userCase

        //montrer un titre h1 avec le titre de l'article

        $post = $this->usercase->execute([
            'title' => $request->request->get('title', ''),
            'content' => $request->request->get('content', ''),
            'publishedAt' => $request->request->has('published') ? new DateTime() : null
        ]);

        return new Response("<h1>{$post->title}</h1>");
    }
}
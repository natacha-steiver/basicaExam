<?php
/*
  ./src/Controller/PostsController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Posts;
use Symfony\Component\HttpFoundation\Request;
// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;

/**
 * [PostsController description]
 */
class PostsController extends GenericController {
    /**
     * [showAction description]
     * @param  int     $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showAction(int $id, Request $request){
      /**
       * [$post description]
       * @var [type]
       */
      $post =  $this->_repository->find($id);
      return $this->render('posts/show.html.twig',[
        'post'   => $post,

        /*'posts' => $posts */
      ]);
    }

    /**
     * [indexAction description]
     * @param  string             $vue       [description]
     * @param  [type]             $limit     [description]
     * @param  Request            $request   [description]
     * @param  PaginatorInterface $paginator [description]
     * @return [type]                        [description]
     */
    public function indexAction($vue='liste',int $limit = null,Request $request,PaginatorInterface $paginator){

      /**
       * [$request description]
       * @var [type]
       */
      $request = Request::createFromGlobals();
      $postsReseauxSociaux = $this->_repository->findByCompte($facebook='facebook',$twitter='twitter',$limit);
      $posts = $this->_repository->findByOtherCompte($autre='autre',$limit);
      // Paginate the results of the query
      $paginations = $paginator->paginate(

         // Doctrine Query, not results
         $posts,
         // Define the page parameter
         $request->query->getInt('page', 1),
         // Items per page
         4);
        // $paginations->setUsedRoute('app_posts_index');
      //   $paginations->setTemplate('posts/pagination.html.twig');
      return $this->render('posts/'.$vue.'.html.twig',[
        'posts' => $posts,
        'paginations' => $paginations,
        'postsReseauxSociaux' => $postsReseauxSociaux,


      ]);
    }


    /**
     * [latestPostAction description]
     * @param  string  $vue     [description]
     * @param  array   $orderBy [description]
     * @param  integer $limit   [description]
     * @return [type]           [description]
     */
    public function latestPostAction($vue='latest',array $orderBy = ['dateCreation' => 'DESC'],int $limit =4){
      /**
       * [$posts description]
       * @var [type]
       */
      $posts=$this->_repository->findBy([],$orderBy,$limit);
      return $this->render('posts/'.$vue.'.html.twig',[
        'posts' => $posts,


      ]);
    }
}

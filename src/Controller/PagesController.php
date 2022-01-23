<?php
/*
  ./src/Controller/PageController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Pages;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * [PagesController description]
 */
class PagesController extends GenericController {
    /**
     * [showAction description]
     * @param  int     $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showAction(int $id, Request $request){
      /**
       * [$page description]
       * @var [type]
       */
      $page = $this->_repository->find($id);
      return $this->render('pages/show.html.twig',[
        'page'   => $page,

        /*'posts' => $posts */
      ]);
    }
    /**
     * [indexAction description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function indexAction(Request $request){
      /**
       * [$currentPage description]
       * @var [type]
       */
      $currentPage = explode('/', $_SERVER['REQUEST_URI']);
      $currentPage = isset($currentPage[8]) ? $currentPage[8] : '';
      $pages = $this->_repository->findAll();

      return $this->render('pages/index.html.twig',[
        'pages' => $pages,

          'currentPage' => $currentPage

      ]);
    }

}

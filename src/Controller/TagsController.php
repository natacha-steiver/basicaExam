<?php
/*
  ./src/Controller/TagsController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Tags;
use Symfony\Component\HttpFoundation\Request;

/**
 * [TagsController description]
 */
class TagsController extends GenericController {
    /**
     * [showAction description]
     * @param  int     $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showAction(int $id, Request $request){
      /**
       * [$tag description]
       * @var [type]
       */
      $tag = $this->_repository->find($id);
      return $this->render('tags/show.html.twig',[
        'tag'   => $tag,

      ]);
    }

    /**
     * [indexAction description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function indexAction(Request $request){
      /**
       * [$tags description]
       * @var [type]
       */
      $tags = $this->_repository->findAll();
      return $this->render('tags/index.html.twig',[
        'tags' => $tags,


      ]);
    }

}

<?php
/*
  ./src/Controller/WorksController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Works;

use Symfony\Component\HttpFoundation\Request;

/**
 * [WorksController description]
 */
class WorksController extends GenericController {
    /**
     * [showAction description]
     * @param  int     $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showAction(int $id, Request $request){
      /**
       * [$work description]
       * @var [type]
       */
      $work = $this->_repository->find($id);
      $simularWorks =  $this->_repository->findByTag($id);
      return $this->render('works/show.html.twig',[
        'work'   => $work,
        'simularWorks'=> $simularWorks

      ]);
    }

    /**
     * [indexAction description]
     * @param  Request $request [description]
     * @param  string  $vue     [description]
     * @param  array   $orderBy [description]
     * @param  [type]  $limit   [description]
     * @return [type]           [description]
     */
    public function indexAction(Request $request, $vue='index',array $orderBy = ['dateCreation' => 'DESC'] ,int $limit = null){
      /**
       * [$request description]
       * @var [type]
       */
      $request = Request::createFromGlobals();
      $offset=$request->get('offset');
      if(isset($offset) ):
        $vue = "workOffset";

      endif;
      $works = $this->_repository->findBy([], $orderBy, $limit,$offset);
      return $this->render('works/'.$vue.'.html.twig',[
        'works' => $works,


      ]);

    }
    function oldersAction(int $limit = null, Request $request){
      $offset = $request->request->get('offset');
      $works = $this->_repository->findBy([],['date'=> 'DESC'], $limit =6 , $offset
      );
      return $this->render('works/index.html.twig',[
        'works'=> $works,
      ]);
    }
    


    /**
     * [sliderAction description]
     * @param  string $vue [description]
     * @return [type]      [description]
     */
    public function sliderAction($vue='liste'){
      /**
       * [$works description]
       * @var [type]
       */
      $works = $this->_repository->findAll();
      return $this->render('works/'.$vue.'.html.twig',[
        'works' => $works,


      ]);

    }

}

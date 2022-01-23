<?php
/*
  ./src/Controller/CategoriesController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Request;
/**
 * [CategoriesController description]
 */
class CategoriesController extends GenericController {
      /**
       * [showAction description]
       * @param  int     $id      [description]
       * @param  Request $request [description]
       * @return [type]           [description]
       */
    public function showAction(int $id, Request $request){
        /**
         * [$categorie description]
         * @var [type]
         */
      $categorie = $this->_repository->find($id);
      return $this->render('categories/show.html.twig',[
        'categorie'   => $categorie,


      ]);
    }

    /**
     * [indexAction description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function indexAction(Request $request){

      /**
       * [$categories description]
       * @var [type]
       */
      $categories = $this->_repository->findAll();
      return $this->render('categories/index.html.twig',[
        'categories' => $categories,


      ]);
    }

}

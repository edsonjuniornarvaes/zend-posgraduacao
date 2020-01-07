<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller;
use Application\Model\Assunto;
use Application\Model\AssuntoTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class AssuntoController
 *
 * @package Application\Controller
 */
class AssuntoController extends AbstractActionController
{

    private $assuntoTable;

    /**
     * AssuntoController constructor.
     *
     * @param \Application\Model\AssuntoTable $assuntoTable
     */
    public function __construct(AssuntoTable $assuntoTable)
    {
        $this->assuntoTable = $assuntoTable;
    }

    /**
     * @return array|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $assuntos = $this->assuntoTable->getAll();
        return new ViewModel([
            'assuntos' => $assuntos
        ]);
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function editarAction()
    {
        $codigo = $this->params('codigo');
        $assunto = new Assunto();

        if (!empty($codigo)) {
            $assunto = $this->assuntoTable->get($codigo);
        }
        return new ViewModel([
            'assunto' => $assunto
        ]);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function gravarAction()
    {
        $assunto = new Assunto();
        $assunto->exchangeArray($_POST);
        if ($assunto->hasData()) {
            $assunto->codigo = null;
            $this->assuntoTable->save($assunto);
        }
        return $this->redirect()->toRoute('assunto');
    }

    /**
     * @return \Zend\Http\Response
     */
    public function excluirAction()
    {
        $this->assuntoTable->delete($this->params('codigo'));
        return $this->redirect()->toRoute('assunto');
    }
}

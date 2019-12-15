<?php
namespace Eckert\Todo\Controller;


/***************************************************************
 *
 *  (c) 2015 Roman Eckert <mail@romaneckert.de>
 *
 *  All rights reserved
 *
 ***************************************************************/
use Eckert\Todo\Domain\Model\Entry;

/**
 * EntryController
 */
class EntryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 *
	 * @var \Eckert\Todo\Domain\Repository\EntryRepository
	 * @inject
	 */
	protected $entryRepository = NULL;


	public function listAction() {
		$entries = $this->entryRepository->findAll();

		$this->view->assign('entries', $entries);
	}

	public function ajaxAction() {
		$arguments = $this->request->getArguments();
        $entryData = $arguments['entry'];

        if(empty($entryData['uid'])) {
            $entry = new Entry();
            if(!empty($entryData['title'])) {
                $entry->setTitle($entryData['title']);
            }
            $this->entryRepository->add($entry);
        } else {
            $entry = $this->entryRepository->findByUid($entryData['uid']);

            if(!empty($entryData['title'])) {
                $entry->setTitle($entryData['title']);
            }

            if(!is_null($entryData['solved'])) {

                $entry->setSolved($entryData['solved']);
            }

            $this->entryRepository->update($entry);
        }

        $this->objectManager->get('Tx_Extbase_Persistence_Manager')->persistAll();

		return json_encode($entry->_getProperties());
	}

    public function deleteAction() {
        $entries = $this->entryRepository->findAll();
        foreach($entries as $entry) {
            if($entry->getSolved() == 1) {
                $this->entryRepository->remove($entry);
            }
        }

        $this->redirect('list');
    }

}
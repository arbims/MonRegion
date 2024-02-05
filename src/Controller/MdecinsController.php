<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

/**
 * Mdecins Controller
 *
 * @property \App\Model\Table\MdecinsTable $Mdecins
 */
class MdecinsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Mdecins->find()
            ->contain(['Villes']);
        $mdecins = $this->paginate($query);

        $this->set(compact('mdecins'));
    }

    /**
     * View method
     *
     * @param string|null $id Mdecin id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mdecin = $this->Mdecins->get($id, contain: ['Villes']);
        $this->set(compact('mdecin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mdecin = $this->Mdecins->newEmptyEntity();
        if ($this->request->is('post')) {
            $mdecin = $this->Mdecins->patchEntity($mdecin, $this->request->getData());
            if ($this->Mdecins->save($mdecin)) {
                $this->Flash->success(__('The mdecin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdecin could not be saved. Please, try again.'));
        }
        $TableRegions = TableRegistry::getTableLocator()->get('Regions');
        $regions = $TableRegions->find('list')->all();
        $this->set(compact('mdecin', 'regions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mdecin id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mdecin = $this->Mdecins->get($id, contain: ['Villes']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mdecin = $this->Mdecins->patchEntity($mdecin, $this->request->getData());
            if ($this->Mdecins->save($mdecin)) {
                $this->Flash->success(__('The mdecin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mdecin could not be saved. Please, try again.'));
        }
        $TableDepartements = TableRegistry::getTableLocator()->get('Departements');
        $TableRegions = TableRegistry::getTableLocator()->get('Regions');
        $selected_departement = $TableDepartements->find()->where(['id' => $mdecin->ville->departement_id])->first();
        $selected_region = $TableRegions->find()->where(['id' => $selected_departement->region_id])->first();
        $departements = $TableDepartements->find('list')->where(['region_id' => $selected_departement->region_id])->all();
        $regions = $TableRegions->find('list')->all();
        $villes = $this->Mdecins->Villes->find()->where(['departement_id' => $selected_departement->id])->distinct('name')->toArray();
        $villes = Hash::combine($villes,'{n}.id', ['%s %s', '{n}.code', '{n}.name']);
        $this->set(compact('mdecin', 'villes','regions','departements', 'selected_departement','selected_region'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mdecin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mdecin = $this->Mdecins->get($id);
        if ($this->Mdecins->delete($mdecin)) {
            $this->Flash->success(__('The mdecin has been deleted.'));
        } else {
            $this->Flash->error(__('The mdecin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getDepartement(){
        $regId = $this->request->getQuery('regId');
        $TableDepartements = TableRegistry::getTableLocator()->get('Departements');
        $departements = $TableDepartements->find('list')->where(['region_id'=> $regId])->all();
        $this->viewBuilder()->disableAutoLayout();
        $this->set(compact('departements'));
        return $this->render('/Pages/departement');
    }

    public function getVille(){
        $depId = $this->request->getQuery('depId');
        $TableVilles = TableRegistry::getTableLocator()->get('Villes');
        $villes = $TableVilles->find()->where(['departement_id'=> $depId])->distinct('name')->all()->toArray();
        $villes = Hash::combine($villes,'{n}.id', ['%s %s', '{n}.code', '{n}.name']);
        $this->viewBuilder()->disableAutoLayout();
        $this->set(compact('villes'));
        return $this->render('/Pages/villes');
    }

}

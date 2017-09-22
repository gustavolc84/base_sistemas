<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

    /**
     * Delete method
     *
     * @param string|null $id <?= $singularHumanName ?> id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->data('id');     
        $<?= $singularName ?> = $this-><?= $currentModelName ?>->get($id);
        if ($this-><?= $currentModelName; ?>->delete($<?= $singularName ?>)) {
            $this->Flash->success(__('<?= strtolower($singularHumanName) ?> deletado com sucesso.'));
        } else {
            $this->Flash->error(__('<?= strtolower($singularHumanName) ?> não pode ser deletado. Favor tentar novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

<?php
namespace App\Controller;

use App\Controller\AppController;
use finfo; 
/**
 * Videos Controller
 *
 * @property \App\Model\Table\VideosTable $Videos
 */
class VideosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $videos = $this->paginate($this->Videos);

        $this->set(compact('videos'));
        $this->set('_serialize', ['videos']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function upload()
    {
        // $videos = $this->paginate($this->Videos);

        // $this->set(compact('videos'));
        // $this->set('_serialize', ['videos']);
        // $file = $this->params->form['files'];
        // print_r($file);
    }

    public function uploadFile($file = null)
    {
        // $videos = $this->paginate($this->Videos);

        // $this->set(compact('videos'));
        // $this->set('_serialize', ['videos']);
        //$file = $this->params->form['files'];
        if($this->uploaMydFile($this->request->data['file']) == false)
        {
            print("ERROR");
            die();
        }
        else{
            print("SUCCESS");
            die();
            //return $this->redirect(['action' => 'upload' ]);
        }



    }


    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);

        $this->set('video', $video);
        $this->set('_serialize', ['video']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $video = $this->Videos->newEntity();
        if ($this->request->is('post')) {
            $video = $this->Videos->patchEntity($video, $this->request->data);
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('video'));
        $this->set('_serialize', ['video']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Videos->patchEntity($video, $this->request->data);
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('video'));
        $this->set('_serialize', ['video']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function uploaMydFile($file){
            //print_r($file);

            //die();
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($file['error']) ||
                is_array($file['error'])
            ) {
                $this->Flash->error(__('Invalid parameters.')); 
                return false;
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($file['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $this->Flash->error(__('No file sent.')); 
                    return false;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $this->Flash->error(__('Exceeded filesize limit.')); 
                    return false;
                default:
                    $this->Flash->error(__('Unknown errors.')); 
                    return false;
            }

            // You should also check filesize here. 
            if ($file['size'] > 5000000000 ) {
                $this->Flash->error(__('Exceeded filesize limit.' )); 
                return false;
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($file['tmp_name']),
                array(
                    'mp4' => 'video/mp4',
                    'webm' => 'video/webm',
                ),
                true
            )) {
                $this->Flash->error(__('Invalid file format.')); 
                return false;
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            if (!move_uploaded_file(
                $file['tmp_name'],
                sprintf( WWW_ROOT . '/uploads/%s.%s',
                    sha1_file($file['tmp_name']),
                    $ext
                )
            )) {
                $this->Flash->error(__('Failed to move uploaded file.')); 
                return false;
            }

            $video = $this->Videos->newEntity();
            $video->name = pathinfo($file['name'],PATHINFO_FILENAME);
            $video->url = sha1_file($file['tmp_name']) . "." . $ext;
            $this->Videos->save($video);
            return true; 


    }

}

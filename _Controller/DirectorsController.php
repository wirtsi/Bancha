<?php
    class DirectorsController extends AppController {

        var $name = 'Directors';

        public function index() {
            $this->Director->recursive = 0;
            $directors = $this->paginate();
            return array_merge($this->request['paging']['Director'], array('records' => $directors));
        }

        public function view($id = null) {
            $this->Director->id = $id;
            if (!$this->Director->exists()) {
                throw new NotFoundException(__('Invalid Director'));
            }
            $this->Director->read(null, $id);
            /*--> */
            return $this->Director->data; // added
        }

        public function add() {
            if ($this->request->is('post')) {
                $this->Director->create();
                if ($this->request->params['isBancha']) return $this->Director->saveFieldsAndReturn($this->request->data);
            }
        }

        public function edit($id = null) {
        firecake($this->request->data);
            $this->Director->id = $id;
            if (!$this->Director->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            //save hasMany data
            if (isset($this->request->data['Director']['movie_id'])) {
                $movieData = array();
                $movieData['Director'] = array('id'=>$id);
                foreach ($this->request->data['Director']['movie_id'] as $movie) {
                    $movieData['Movie'][] = array('director_id'=>$id,'id'=>$movie);

                }
                $this->Director->saveAssociated($movieData);
            }
            //save Bancha data
            if ($this->request->params['isBancha']) return $this->Director->saveFieldsAndReturn($this->request->data); // added

        }

        public function delete($id = null) {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Director->id = $id;
            if (!$this->Director->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->params['isBancha']) return $this->Director->deleteAndReturn(); // added
        }
	}
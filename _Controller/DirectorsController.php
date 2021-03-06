<?php
    class DirectorsController extends AppController {

        var $name = 'Directors';

        public function index() {
            $this->Director->recursive = 1;
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
            $this->Director->id = $id;
            if (!$this->Director->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            //save Bancha data
            //return $this->Director->saveFieldsAndReturn($this->request->data);
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
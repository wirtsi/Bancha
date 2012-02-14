<?php
    class ActorsController extends AppController {

        var $name = 'Countries';

        public function index() {
            $this->Actor->recursive = 0;
            $actors = $this->paginate();
            return array_merge($this->request['paging']['Actor'], array('records' => $actors));
        }

        public function view($id = null) {
            $this->Actor->id = $id;
            if (!$this->Actor->exists()) {
                throw new NotFoundException(__('Invalid Actor'));
            }
            $this->Actor->read(null, $id);
            /*--> */
            return $this->Actor->data; // added
        }

        public function add() {
            if ($this->request->is('post')) {
                $this->Actor->create();
                if ($this->request->params['isBancha']) return $this->Actor->saveFieldsAndReturn($this->request->data);
            }
        }

        public function edit($id = null) {
            $this->Actor->id = $id;
            if (!$this->Actor->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->params['isBancha']) return $this->Actor->saveFieldsAndReturn($this->request->data); // added

        }

        public function delete($id = null) {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Actor->id = $id;
            if (!$this->Actor->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->params['isBancha']) return $this->Actor->deleteAndReturn(); // added
        }
	}
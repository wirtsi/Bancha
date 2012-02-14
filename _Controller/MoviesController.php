<?php
    class MoviesController extends AppController {

        var $name = 'Movies';

        public function index() {
            $this->Movie->recursive = 0;
            $movies = $this->paginate();
            return array_merge($this->request['paging']['Movie'], array('records' => $movies));
        }

        public function view($id = null) {
            $this->Movie->id = $id;
            if (!$this->Movie->exists()) {
                throw new NotFoundException(__('Invalid Movie'));
            }
            $this->Movie->read(null, $id);
            /*--> */
            return $this->Movie->data; // added
        }

        public function add() {
            if ($this->request->is('post')) {
                $this->Movie->create();
                if ($this->request->params['isBancha']) return $this->Movie->saveFieldsAndReturn($this->request->data);
            }
        }

        public function edit($id = null) {
            $this->Movie->id = $id;
            if (!$this->Movie->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->params['isBancha']) return $this->Movie->saveFieldsAndReturn($this->request->data); // added

        }

        public function delete($id = null) {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Movie->id = $id;
            if (!$this->Movie->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->params['isBancha']) return $this->Movie->deleteAndReturn(); // added
        }
	}
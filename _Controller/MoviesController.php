<?php
    class MoviesController extends AppController {

        var $name = 'Movies';
        public $paginate = array(); //don't forget to set this

        public function index() {
            $this->Movie->recursive = 1;

//            $this->paginate['joins'] = array(
//                array('table' => 'movies_actors',
//                    'alias' => 'JoinTable',
//                    'type' => 'INNER',
//                    'conditions' => array(
//                        'Movie.id = JoinTable.movie_id',
//                    )
//                ),
//                    array('table' => 'actors',
//                        'alias' => 'Actor',
//                        'type' => 'inner',
//                        'conditions' => array(
//                            'JoinTable.actor_id = Actor.id'
//                        )
//
//                    )
//            );
//            $this->paginate['fields'] = array('Movie.*','Actor.id');
//            $this->paginate['maxLimit'] = 1000;

//            $results = $this->paginate();
//            foreach ($results as $key => $value) {
//                $results[$key]['Movie']['actor_id'] = $results[$key]['Actor']['id'];
//                unset($results[$key]['Actor']);
//            }
            $results = $this->paginate();
            return array_merge($this->request['paging']['Movie'], array('records' => $results));
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
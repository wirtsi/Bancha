<?php
    class ActorsController extends AppController {

        var $name = 'Actors';
        public $paginate = array(); //don't forget to set this

        public function index() {
            $this->Actor->recursive = 0;

            $this->paginate['joins'] = array(
                array('table' => 'movies_actors',
                    'alias' => 'JoinTable',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Actor.id = JoinTable.actor_id',
                    )
                ),
                array('table' => 'movies',
                    'alias' => 'Movie',
                    'type' => 'inner',
                    'conditions' => array(
                        'JoinTable.movie_id = Movie.id'
                    )

                )
            );
            $this->paginate['fields'] = array('Actor.*','Movie.id');
            $this->paginate['maxLimit'] = 1000;
            $results = $this->paginate();

            foreach ($results as $key => $value) {
                $results[$key]['Actor']['movie_id'] = $results[$key]['Movie']['id'];
                unset($results[$key]['Movie']);
            }
            return array_merge($this->request['paging']['Actor'], array('records' => $results));
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
<?php
	
	namespace Database;
	use PDO;
	
	class requete extends connexion {
		
		private $prepare_fields;
		private $data_prepare;
		private $insert_fields;

		/**
		 * @param $fields array Prépare les champs pour un UPDATE
		 * @return string
		 */
		private function prepare_fields($fields){
			for($i=0; $i < count($fields); $i++){
				$this->prepare_fields .= $fields[$i] . '=:' . $fields[$i] . ',';
			}
			$data = substr($this->prepare_fields,0,-1);
			return $data;
		}

		/**
		 * @param $fields array Prépare les champs pour un INSERT
		 * @return string
		 */
		private function prepare_value($fields){
			for($i=0; $i < count($fields); $i++){
				$this->data_prepare .= ':' . $fields[$i] . ',';
			}
			$data = substr($this->data_prepare,0,-1);
			return $data;
		}


		private function insert_fields($fields){
			for($i=0; $i < count($fields); $i++){
				$this->insert_fields .= $fields[$i] . ',';
			}
			$data = substr($this->insert_fields,0,-1);
			return $data;
		}

		/**
		 * @param string $table Table SQL
		 * @param array $fields Champs SQL
		 * @param array $param Variable à associer aux champs SQL
		 * @return \PDOStatement
		 */
		public function create($table,$fields=array(),$param=array()){
			$req = $this->getPDO()->prepare('INSERT INTO ' . $table . '(' . $this->insert_fields($fields) . ') VALUES(' .  $this->prepare_value($fields) . ')');
			if(count($fields) == count($param)){
				for($i=0 ; $i < count($fields) ; $i++){
					$req->bindValue(':' . $fields[$i], $param[$i]);
				}
			}
			$req->execute();
			return $req;
		}

		/**
		 * @param $statement Requete SQL basic
		 * @return array
		 */
		public function read($statement){
			$req = $this->getPDO()->query($statement);
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		/**
		 * @param $field string Champs SQL
		 * @param $table string Table SQL
		 * @param $where string Champs ID_"de référence de la table SQL"
		 * @param $param string Variable contenant l'ID de l'URL
		 * @return mixed
		 */
		public function read_and_bind($field,$table,$where,$param){
			$req = $this->getPDO()->prepare('SELECT ' . $field . ' FROM ' . $table . ' WHERE ' . $where . '=:' . $where);
			$req->bindParam(':'. $where, $param);
			$req->execute();
			$data = $req->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		/**
		 * @param string $table Table SQL
		 * @param array  $fields Champs SQL
		 * @param array  $where argument 1 : Champs ID_"de référence de la table SQL", argument 2 : Variable contenant l'ID de l'URL
		 * @param array  $param Variable à associer aux champs SQL
		 * @return \PDOStatement
		 */
		public function update($table,$fields=array(),$where=array(),$param=array()){
			$req = $this->getPDO()->prepare('UPDATE ' . $table . ' SET ' . $this->prepare_fields($fields) . ' WHERE ' . $where[0] . '=:' . $where[0]);
			$req->bindParam(':' . $where[0], $where[1]);
			if(count($fields) == count($param)){
				for($i=0 ; $i < count($fields) ; $i++){
					$req->bindParam(':'.$fields[$i], $param[$i]);
				}
			}
			$req->execute();
			return $req;
		}

		/**
		 * @param string $table $table Table SQL
		 * @param array  $where $where argument 1 : Champs ID_"de référence de la table SQL", argument 2 : Variable contenant l'ID de l'URL
		 */
		public function delete($table,$where=array()){
			$req = $this->getPDO()->prepare('DELETE FROM ' . $table . ' WHERE ' . $where[0] . '=:' . $where[0]);
			$req->bindValue(':' . $where[0], $where[1]);
			$req->execute();
		}
		
	}
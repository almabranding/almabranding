<?php
class Index_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    function getProjects() {
        return $this->db->select("SELECT * FROM projects p JOIN projects_photos pp on (pp.project_id=p.id) JOIN photos ph on (ph.id=pp.photo_id) WHERE p.id=11 AND pp.thumb=1 ORDER BY p.position");
    }
}
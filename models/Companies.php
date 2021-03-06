<?php

class Companies extends Model {

    private $companyInfo;

    public function __construct($id) {
        parent::__construct();

        $sql = "SELECT * FROM companies WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowcount() >0 ) {
            $this->companyInfo = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getName() {

        if(isset($this->companyInfo['name'])) {
            return $this->companyInfo['name'];
        } else {
            return '';
        }
    }

}
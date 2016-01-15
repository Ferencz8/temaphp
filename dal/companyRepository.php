<?php

class CompanyRepository {

    protected $db;
    protected $cvRepository;

    function __construct()
    {
        $this->db = Db::getInstance();
        $this->cvRepository = new CVRepository();
    }

    public function create($company)
    {
        try {
            $userRepository = new UserRepository();
            $company->user->accounttype = 1;
            $userRepository->create($company->user);

            $null = null;
            $req = $this->db->prepare('INSERT INTO companies VALUES(:id, :userId, :name, :description, :address, :phone, :email, :logo, :cities)');
            $req->bindParam(':id', $company->id);
            $req->bindParam(':userId', !is_null($company->user) ? $company->user->id : $null);
            $req->bindParam(':description', $company->description);
            $req->bindParam(':name', $company->name);
            $req->bindParam(':address', $company->address);
            $req->bindParam(':phone', $company->phone);
            $req->bindParam(':email', $company->email);
            $req->bindParam(':logo', $company->logo);
            $req->bindParam(':cities', $company->cities);

            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function getCompanyByUserId($userId) {

        $id = intval($userId);
        $req = $this-> db->prepare('SELECT * FROM companies WHERE userId = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        $companie = Company::getModel($res);

        return $companie;
    }

    public function update($company){
        try {
            $null = null;
            $req = $this->db->prepare('UPDATE companies SET name =:name,description =:description,address =:address,phone =:phone,email =:email, logo=:logo, cities=:cities WHERE id =:id');
            $req->bindParam(':id', $company->id);
            $req->bindParam(':name', $company->name);
            $req->bindParam(':description', $company->description);
            $req->bindParam(':address', $company->address);
            $req->bindParam(':phone', $company->phone);
            $req->bindParam(':email', $company->email);
            $req->bindParam(':logo', $company->logo);
            $req->bindParam(':cities', $company->cities);

            $req->execute();
        } catch (PDOException $e) {

        }
    }
}

<?php namespace App\Controllers;

class Bill extends BaseController{

    /**
     * @var db
     */
    private $db;

    public function __construct()
     {
         $this->db = db_connect();
     }

    public function new()
    {
        $bill_info = '';
        return view('Views/Home/CreateBill', [
            'users' => $this->getUser(),
            'bill' => $this->getBill('Y-m')
        ]);
    }

    public function create()
    {
        $unit_data = [
            'user_id' => $this->request->getPost('user_id', FILTER_SANITIZE_NUMBER_INT),
            'month' => $this->request->getPost('month', FILTER_SANITIZE_STRING),
            'unit' => $this->request->getPost('unit', FILTER_SANITIZE_NUMBER_INT),
        ];

        if($this->db->table('units')->insert($unit_data)){
            $bill_data = [
                'user_id' => $unit_data['user_id'],
                'month' => $unit_data['month'],
                'bill' => $unit_data['unit'] - $this->getUnit()
            ];
            session()->set(['msg' => 'Unit Information saved successfully.', 'msgClr' => 'success']);
            return redirect()->back();
        }
        else {
            session()->set(['msg' => 'Something went wrong.', 'msgClr' => 'danger']);
            return redirect()->back();
        }
    }

    public function getUnit($month, $user_id = null)
    {
        $query = $this->db->table('units');

        if(empty($user_id)){
            return $query->select('*')->where('month', $month)->get()->getResultArray();
        }
        else return $query->select('*')->where('month', $month)->where('user_id', $user_id)->get()->getRow();
    }

    public function getUser($user_id = null)
    {
        $query = $this->db->table('users');
        if(empty($user_id)){
            return $query->select('*')->get()->getResultArray();
        }
        else return $query->select('*')->where('id', $user_id)->get()->getRow();
    }

    public function getBill($month, $user_id = null)
    {
        $query = $this->db->table('bills');

        if(empty($user_id)){
            return $query->select('*')->where('month', $month)->get()->getResultArray();
        }
        else return $query->select('*')->where('month', $month)->where('user_id', $user_id)->get()->getRow();
    }
}

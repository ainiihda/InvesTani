<?php
namespace App;
use App\proyek;
use App\category;
use App\investasi;
use App\User;
use Carbon\Carbon;

interface UserRepository {
  public function getWaktu();
  public function getProyekData($id);
  public function getInvestProyek($id);
  public function getProyekList($id_user);
  public function getCategory();
}

class ProyekRepo{

    
    public function getProyekData($id){ 
        return proyek::where('proyeks.id', '=', $id)->get();
    }
    public function getProyekList($id_user){
        $result = proyek::where('proyeks.user_id', $id_user) 
                        //  ->where('proyeks.status', '=', '0')
                         ->get();
                  //    dd($result);
        return($result);
    }
    public function getCategory(){
        return category::get();
    }


}


?>
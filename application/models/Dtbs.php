<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtbs extends CI_Model {
    function kontrol($email, $sifre) {
        $sonuc = $this->db
            ->select('*')
            ->from('yonetici')
            ->where('email', $email)
            ->where('sifre', sha1(md5($sifre)))
            ->get()
            ->row();
        
        return $sonuc;
    }

    function listele($from){
        $sonuc=$this->db->select('*')->from($from)->order_by('id','desc')->get()->result_array();
        return $sonuc;
    }
    function cek($id,$from){
        $sonuc=$this->db->select('*')->from($from)->
        where("id",$id)->get()->row_array();
        return $sonuc;
    }
    function guncelle($data = array(),$id,$where,$from)
    {
        $sonuc = $this -> db ->where($where,$id)->update($from,$data);
        return $sonuc;
    }
    function ekle($from,$data = array())
    {
        $sonuc = $this->db->insert($from,$data);
        return $sonuc ;
    }

    function sil($id,$where,$from){
        $sonuc = $this->db->delete($from,array($where=>$id));
        return $sonuc;
    }


}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yonetim extends CI_Controller {

    public function protect(){
        $giris = $this->session->userdata('giris');
        if(!$giris){
            redirect('yonetim');
        }
    }

    public function index() {
        $giris = $this->session->userdata('giris');
        if($giris){
            redirect('yonetim/anasayfa');
        }
        $this->load->view('back/giris');
    }

    public function girisYap() {
        $email = $this->input->post("email");
        $sifre = $this->input->post("sifre");
        
        $this->load->model('dtbs');
        
        $kontrol = $this->dtbs->kontrol($email, $sifre);
        
        if ($kontrol) {
            $this->session->set_userdata('giris', true);
            redirect('yonetim/anasayfa');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
           Email Veya Şifre Hatalı
        </div>');           
         redirect('yonetim');
        }
    }

    public function anasayfa(){
        $this->protect();
        $this->load->view('back/anasayfa');
    }
    
    public function cikis(){
        $this->session->sess_destroy();
        redirect('yonetim','refresh');
    }

    public function ayarlar()
    {
        $this->load->model('dtbs');
        $data['bilgi'] = $this->dtbs->listele('site_ayarlari');
        $this->load->view('back/ayarlar/anasayfa', $data);
    }
    public function ayarduzenle($id)
    {
        $sonuc = $this->dtbs->cek($id,'site_ayarlari');
        $data['bilgi'] = $sonuc; 
    
        $this->load->view('back/ayarlar/edit/anasayfa', $data);
    }
    public function ayarguncelle()
    {
      $data = array (
        'id'       => $id = $this ->input->post('id'),
     'title'       => $title = $this ->input->post('baslik'),
     'site_mail'   => $mail = $this -> input->post('email'),
     'site_telefon'=> $telefon = $this -> input->post('telefon'),
     'site_desc'   => $desc = $this -> input->post('desc'),
     'site_keyw'   => $keyw = $this -> input->post('keyw'),
     'site_bilgi'  => $bilgi = $this -> input->post('bilgi'),
     'site_adres'  => $adres = $this -> input->post('adres')
      );
      $this->load->model('Dtbs');
      $sonuc = $this->Dtbs->guncelle($data, $id, 'id', 'site_ayarlari'); // guncelle() yöntemini çağırın
      
     if ($sonuc)
     {
        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
       Güncellendi
    </div>');        redirect('yonetim/ayarlar');
     }
     else 
     {
        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
     Güncellenemdi
    </div>');           redirect('yonetim/ayarlar');
     }

    }

    //Genel Ayarlar Bitiş

    //Sosyal Medya Başlangıç
    public function sosyalmedya()
    {
      $this->load->model('dtbs');
      $data['bilgi'] = $this->dtbs->listele('sosyal_medya');
      $this->load->view('back/sosyalmedya/anasayfa', $data);
    }
    public function smedyaekle()
    {
        $this->load->view('back/sosyalmedya/ekle/anasayfa');
    }
  public function smedyaekleme()
  {
      $data = array (
          'title'=>$baslik = $this->input->post('baslik'),
           'url' => $url   = $this->input->post('url'),
           'durum'=>1
          );
   $sonuc = $this ->dtbs->ekle('sosyal_medya',$data);
          if ($sonuc)
      {
        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
      Ekleme işlemi başarılı 
    </div>');              redirect('yonetim/sosyalmedya');
      }
      else
      {
        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
       Eklenemedi...
    </div>');              redirect('yonetim/sosyalmedya');
      }
  }
  public function smedyaduzenle($id)
  {
      $sonuc = $this->dtbs->cek($id,'sosyal_medya');
      $data['bilgi'] = $sonuc; 
  
      $this->load->view('back/sosyalmedya/edit/anasayfa', $data);
  }
  public function smedyaguncelle()
    {
      $data = array (
        'id'       => $id = $this ->input->post('id'),
     'title'       => $title = $this ->input->post('baslik'),
     'url'   => $url = $this -> input->post('url'),
     'durum'   => $durum = $this -> input->post('durum'),

     
      );
      $this->load->model('Dtbs');
      $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'sosyal_medya'); 
      
     if ($sonuc)
     {
        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
       Güncellendi
    </div>');
    
    redirect('yonetim/sosyalmedya');
     }
     else 
     {
        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
     Güncellenemdi
    </div>');        redirect('yonetim/sosyalmedya');
     }

    }
    public function smedyasil($id,$where,$from)
    {
        $sonuc = $this->dtbs->sil($id,$where,$from);
        if ($sonuc)
        {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
            Silinme İşlemi Başarılı
            </div>');
            
            redirect('yonetim/sosyalmedya');
        }
        else 
        {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
            Silinemedi
            </div>');
            
            redirect('yonetim/sosyalmedya');
        }
    }
    
    public function smedyaset()
    {
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('sosyal_medya', array('durum' => $durum));
    }
    
//sosyal medya bitiş
// kategoriler başlangıç
public function kategoriler()
{
    $this->load->model('dtbs');
      $data['bilgi'] = $this->dtbs->listele('kategoriler');
      $this->load->view('back/kategoriler/anasayfa', $data);
}
public function kategoriekle()
{
    $this->load->view('back/kategoriler/ekle/anasayfa');
}
public function kategoriekleme()
{
    $data = array (
        'title'=>$baslik = $this->input->post('baslik'),
         'sef' => seflink($baslik),
            );
 $sonuc = $this ->dtbs->ekle('kategoriler',$data);
        if ($sonuc)
    {
        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
      Ekleme işlemi başarılı 
    </div>');
    
    redirect('yonetim/kategoriler');
    }
    else
    {
        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
   Eklenemedi...
</div>');

redirect('yonetim/kategoriler');
    }

}
public function kategorisil($id,$where,$from)
{
 $sonuc = $this->dtbs->sil($id,$where,$from);
 if ($sonuc)
 {
    $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
   Silinme İşlemi Başarılı
</div>');

redirect('yonetim/kategoriler');

 }
 else 
 {
    $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
   Silinme İşlemi Başarısız
</div>');

redirect('yonetim/kategoriler');

 }
}

//kategoriler bitiş
//haber işlemler başlangıç
public function haberler()
{
    
    $this->load->model('dtbs');
      $data['bilgi'] = $this->dtbs->listele('haberler');
      $this->load->view('back/haberler/anasayfa', $data);
}

public function haberekle()
    {
        $this->load->view('back/haberler/ekle/anasayfa');
    }
    public function haberekleme()
    {
        $title = $this->input->post('title');
        $sef =seflink($title);

        $katID = $this->input->post('katID');
        switch ($katID) {
            case 17:
                $kategori = "Magazin";
                break;
            case 18:
                $kategori = "Sağlık";
                break;
            case 19:
                $kategori = "Spor";
                break;
            case 20:
                $kategori = "Siyaset";
                break;
            case 21:
                $kategori = "Kültür";
                break;
            default:
                $kategori = "Diğer";
        }
            $katsef =seflink($kategori);
            $tarih =$this -> input->post('tarih');
            $icerik = $this->input->post('icerik'); 
            $yorum = $this->input->post('yorum');  
           
$sondakika=$this->input->post('sondakika');
$hit=0;
$durum = 1;
$config['upload_path'] = FCPATH . 'assets/front/images/haber';
$config['allowed_types'] = 'gif|jpg|jpeg|png';
$config['encrypt_name'] = TRUE;

$this->load->library('upload', $config);

if ($this->upload->do_upload('resim')) {
    $resim = $this->upload->data();
    $resimyolu = $resim['file_name'];
    $resimkayit = 'assets/front/images/haber/' . $resimyolu;
    $resimtmb = 'assets/front/images/haber/tmb/' . $resimyolu;
    $resimmini = 'assets/front/images/haber/mini/' . $resimyolu;

    $config['image_library'] = 'gd2';
    $config['source_image'] = 'assets/front/images/haber/' . $resimyolu;
    $config['new_image'] = 'assets/front/images/haber/tmb/' . $resimyolu;
    $config['create_thumb'] = false;
    $config['maintain_ratio'] = false;
    $config['quality'] = '60';
    $config['width'] = 409;
    $config['height'] = 260;

    $this->load->library('image_lib', $config);
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
    $this->image_lib->clear();

    $config1['image_library'] = 'gd2';
    $config1['source_image'] = 'assets/front/images/haber/' . $resimyolu;
    $config1['new_image'] = 'assets/front/images/haber/mini/' . $resimyolu;
    $config1['create_thumb'] = false;
    $config1['maintain_ratio'] = false;
    $config1['quality'] = '60';
    $config1['width'] = 94;
    $config1['height'] = 73;

    $this->load->library('image_lib', $config1);
    $this->image_lib->initialize($config1);
    $this->image_lib->resize();
    $this->image_lib->clear();

    // Veritabanına ekleme işlemi
    $data = array(
        'title' => $title,
        'sef' => $sef,
        'resim' => $resimkayit,
        'tumb' => $resimtmb,
        'mini' => $resimmini,
        'katID' => $katID,
        'kategori' => $kategori,
        'hit' => $hit,
        'durum' => $durum,
        'yorum' => $yorum,
        'icerik' => $icerik,
        'sondakika' => $sondakika,
        'tarih' => $tarih
    );

    $sonuc = $this->dtbs->ekle('haberler', $data);
    if ($sonuc) {
        $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
            Ekleme işlemi başarılı
        </div>');
        redirect('yonetim/haberler');
    } else {
        $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
            Eklenemedi...
        </div>');
        redirect('yonetim/haberler');
    }
} else {
    $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
        Eklenemedi...
    </div>');
    redirect('yonetim/haberler');
}

    }

    public function haberset()
    {
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('haberler', array('durum' => $durum));
    }
    
    public function haberduzenle($id)
    {
        $sonuc = $this->dtbs->cek($id,'haberler');
        $data['bilgi'] = $sonuc; 
    
        $this->load->view('back/haberler/edit/anasayfa', $data);
    }
    public function haberduzenleme()
    {
        $id = $this->input->post('id');
        $durum = $this->input->post('durum');
        $title = $this->input->post('title');
        $sef = seflink($title);
        $katID = $this->input->post('katID');
    
        switch ($katID) {
            case 17:
                $kategori = "Magazin";
                break;
            case 18:
                $kategori = "Sağlık";
                break;
            case 19:
                $kategori = "Spor";
                break;
            case 20:
                $kategori = "Siyaset";
                break;
            case 21:
                $kategori = "Kültür";
                break;
            default:
                $kategori = "Diğer";
        }
        $katsef = seflink($kategori);
        $tarih = $this->input->post('tarih');
        $icerik = $this->input->post('icerik');
        $yorum = $this->input->post('yorum');
        $sondakika = $this->input->post('sondakika');
    
        $config['upload_path'] = FCPATH . 'assets/front/images/haber';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE
        ;
        $this->load->library('upload', $config);
    
        // Resim yükleme işlemi
        if ($this->upload->do_upload('resim')) {
            $resim = $this->upload->data();
            $resimyolu = $resim['file_name'];
            $resimkayit = 'assets/front/images/haber/' . $resimyolu;
            $resimtmb = 'assets/front/images/haber/tmb/' . $resimyolu;
            $resimmini = 'assets/front/images/haber/mini/' . $resimyolu;
    
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'assets/front/images/haber/' . $resimyolu;
            $config['new_image'] = 'assets/front/images/haber/tmb/' . $resimyolu;
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '60';
            $config['width'] = 409;
            $config['height'] = 260;
    
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
    
            $config1['image_library'] = 'gd2';
            $config1['source_image'] = 'assets/front/images/haber/' . $resimyolu;
            $config1['new_image'] = 'assets/front/images/haber/mini/' . $resimyolu;
            $config1['create_thumb'] = false;
            $config1['maintain_ratio'] = false;
            $config1['quality'] = '60';
            $config1['width'] = 94;
            $config1['height'] = 73;
    
            $this->load->library('image_lib', $config1);
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();
            $this->image_lib->clear();
    
            $data = array(
                'title' => $title,
                'sef' => $sef,
                'resim' => $resimkayit,
                'tumb' => $resimtmb,
                'mini' => $resimmini,
                'katID' => $katID,
                'kategori' => $kategori,
                'durum' => $durum,
                'yorum' => $yorum,
                'icerik' => $icerik,
                'sondakika' => $sondakika,
                'tarih' => $tarih
            );
    
            $this->load->model('Dtbs');
            $sonuc = $this->dtbs->guncelle('haberler', 'id', $data, $id);
    
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
                    Güncelleme işlemi başarılı
                </div>');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
                    Güncellenemedi...
                </div>');
            }
        } else {
            // Resim yükleme işlemi başarısızsa
            $data = array(
                'title' => $title,
                'sef' => $sef,
                'katID' => $katID,
                'kategori' => $kategori,
                'durum' => $durum,
                'yorum' => $yorum,
                'icerik' => $icerik,
                'sondakika' => $sondakika,
                'tarih' => $tarih
            );
    
            $this->load->model('Dtbs');
            $sonuc = $this->dtbs->guncelle('haberler', 'id', $data, $id);
    
            if ($sonuc) {
                $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
                    Güncelleme işlemi başarılı
                </div>');
            } else {
                $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
                    Güncellenemedi...
                </div>');
            }
        }
    
        redirect('yonetim/haberler');
    }
public function habersil($id,$where,$from)
{
 $sonuc = $this->dtbs->sil($id,$where,$from);
 if ($sonuc)
 {
    $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>Başarılı!</h4>
   Silinme İşlemi Başarılı
</div>');

redirect('yonetim/haberler');

 }
 else 
 {
    $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i>Başarısız!!</h4>
   Silinme İşlemi Başarısız
</div>');

redirect('yonetim/haberler');

 }
}
}
?>
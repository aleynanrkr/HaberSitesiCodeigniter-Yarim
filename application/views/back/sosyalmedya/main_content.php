 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sosyal Medya Listesi</h3>
              <p><a href="<?php echo base_url('yonetim/smedyaekle') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Ekle</a></p>
            </div>
            <?php echo $this->session->flashdata('durum'); ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sıra No</th>
                  <th>Site Başlığı</th>
                  <th>Site Url</th>
                  <th>Durum</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody> <?php $sayi =1; foreach ($bilgi as $bilgi) { ?>
                <tr>
                  <td><?php echo $sayi++; ?></td>
                  <td><?php echo $bilgi['title']?>
                  </td>
                  <td><?php echo $bilgi['url']?></td>
                  <td>
  <input 
  class="toggle_check" 
  data-on="Aktif" data-onstyle="success" 
  data-off="Pasif" data-offstyle="danger" 
  type="checkbox" 
  dataID="<?php echo $bilgi['id'];?>" 
  dataURL="<?php echo base_url('yonetim/smedyaset/');?>" <?php echo ($bilgi['durum'] == 1) ? "checked" : ""; ?>>
</td>

                  <td><a href="<?php echo base_url('yonetim/smedyaduzenle/'.$bilgi['id'].'')?>"> 
                  <button type="button" class="btn btn-info">Düzenle</button></a>
                  <td>
    <a href="<?php echo base_url('yonetim/smedyasil/'.$bilgi['id'].'/id/sosyal_medya')?>" onclick="return confirm('Silmek istediğinizden emin misiniz hocam?')">
        <button type="button" class="btn btn-danger">Sil</button>
    </a>
  </td>
                </tr>
                <?php } ?>
                </tbody>
               </table>
            </div>
            
          </div> 
        </div>
      </div>
    </section>

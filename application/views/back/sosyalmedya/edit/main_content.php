<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Site Ayarları Düzenleme Formu</h3>
        </div>
        <form action="<?php echo base_url('yonetim/smedyaguncelle') ?>" method="post" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Başlık</label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $bilgi['title'] ?>" name="baslik" class="form-control" placeholder="Site Başlık">
                        <input type="hidden" name ="id" value="<?php echo $bilgi['id'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Url</label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $bilgi['url'] ?>" name="url" class="form-control" placeholder="Site Url">
                    </div>
                </div>
              
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-default"><a href="<?php echo base_url('yonetim/sosyalmedya');?>">Geri Dön</a></button>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
            </div>
        </form>
    </div>
</section>

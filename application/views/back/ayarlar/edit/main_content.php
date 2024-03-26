<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Site Ayarları Düzenleme Formu</h3>
        </div>
        <form action="<?php echo base_url('yonetim/ayarguncelle') ?>" method="post" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Başlık</label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $bilgi['title'] ?>" name="baslik" class="form-control" placeholder="Site Başlık">
                        <input type="hidden" name ="id" value="<?php echo $bilgi['id'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Mail</label>
                    <div class="col-sm-6">
                        <input type="email" value="<?php echo $bilgi['site_mail'] ?>" name="email" class="form-control" placeholder="Site Mail">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Telefon</label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $bilgi['site_telefon'] ?>" name="telefon" class="form-control" placeholder="Site telefon">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Açıklama</label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $bilgi['site_desc'] ?>" name="desc" class="form-control" placeholder="Site Açıklaması">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Anahtar Kelimeler</label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $bilgi['site_keyw'] ?>" name="keyw" class="form-control" placeholder="Site Anahtar Kelimeleri">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Bilgisi</label>
                    <div class="col-sm-6">
                        <textarea rows="5" cols="40" name="bilgi"><?php echo $bilgi['site_bilgi']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Site Adresi</label>
                    <div class="col-sm-6">
                        <textarea rows="5" cols="40" name="adres"><?php echo $bilgi['site_adres']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-default"><a href="<?php echo base_url('yonetim/ayarlar');?>">Geri Dön</a></button>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
            </div>
        </form>
    </div>
</section>

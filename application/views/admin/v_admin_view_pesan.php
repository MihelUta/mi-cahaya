        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kotak Masuk <small>MI Cahaya</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Username</th>
                            <th class="column-title">No. Telepon</th>
                            <th class="column-title">Pesan</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span></th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($list_pesan as $pesan) { ?>
                         
                          <tr class="even pointer">
                            <td class=" "><?php echo $no; ?></td>
                            <td class=" "><?php echo $pesan->nama; ?></td>
                            <td class=" "><?php echo $pesan->email; ?></td>
                            <td class=" "><?php echo $pesan->username; ?></td>
                            <td class=" "><?php echo $pesan->no_telp; ?></td>
                            <td class=" "><?php echo $pesan->pesan; ?></td>

                            <td class="a-right a-right ">
<!--                               <a href="<?php echo site_url('admin/edit_siswa/'.$pesan->id); ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-trash"> Edit</<span></span></a> -->   
                              <a href="<?php echo site_url('Admin/hapus_pesan/'.$pesan->id); ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"> Hapus</span></a>
                            </td>
                          </tr>
                          <?php $no++; }  ?>
                        </tbody>
                      </table>
                    </div>
                            
                        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
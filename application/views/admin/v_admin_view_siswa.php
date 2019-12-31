        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Guru <small>MI Cahaya</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">NIS Lokal</th>
                            <th class="column-title">NISN</th>
                            <th class="column-title">NIK</th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Kelas</th>
                            <th class="column-title">Tempat, Tanggal Lahir</th>
                            <th class="column-title">Alamat</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php $no =1?>
                        <?php foreach ($daftar_siswa as $siswa) { ?>
                         
                          <tr class="even pointer">
                            <td class=" "><?php echo $no; ?></td>
                            <td class=" "><?php echo $siswa->nis_lokal; ?></td>
                            <td class=" "><?php echo $siswa->nisn; ?></td>
                            <td class=" "><?php echo $siswa->nik; ?></td>
                            <td class=" "><?php echo $siswa->nama; ?></td>
                            <td class=" "><?php echo $siswa->kelas; ?></td>
                            <td class=" "><?php echo $siswa->ttl; ?></td>
                            <td class=" "><?php echo $siswa->alamat; ?></td>
                            <td class="a-right a-right ">
                              <a href="<?php echo site_url('admin/edit_siswa/'.$siswa->id_user); ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-trash"> Edit</<span></span></a>   
                              <a href="<?php echo site_url('admin/hapus_siswa/'.$siswa->id_user); ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"> Hapus</span></a>
                            </td>
                          </tr>
                          <?php $no++;}  ?>
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
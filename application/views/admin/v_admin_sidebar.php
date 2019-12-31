            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  
                  <li><a><i class="fa fa-newspaper-o"></i> Berita <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('dashboard/add_berita'); ?>">Tambah Berita</a></li>
                      <li><a href="<?= site_url('dashboard/view_berita'); ?>">Lihat Berita</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-file-text-o"></i> Pengumuman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('dashboard/add_pengumuman'); ?>">Tambah Pengumuman</a></li>
                      <li><a href="<?= site_url('dashboard/view_pengumuman'); ?>">Lihat Pengumuman</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-image"></i> Galery Foto <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('dashboard/add_gallery'); ?>">Tambah Foto</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-university"></i> Profil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">coming soon</a></li>
                      <!-- <li><a href="<?= site_url('dashboard/view_sejarah'); ?>">Sejarah</a></li>
                      <li><a href="<?= site_url('dashboard/view_visimisi'); ?>">Visi & Misi</a></li>
                      <li><a href="<?= site_url('dashboard/view_programbelajar'); ?>">Program Belajar</a></li>
                      <li><a href="<?= site_url('dashboard/view_kurikulum'); ?>">Kurikulum</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('dashboard/add_siswa_excel'); ?>">Tambah  Siswa dari Excel</a></li>
                      <li><a href="<?= site_url('dashboard/add_siswa'); ?>">Tambah  Siswa</a></li>
                      <li><a href="<?= site_url('dashboard/view_siswa'); ?>">Lihat Siswa</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Guru <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('dashboard/add_guru_excel'); ?>">Tambah  Guru dari Excel</a></li>
                      <li><a href="<?= site_url('dashboard/add_guru'); ?>">Tambah Guru</a></li>
                      <li><a href="<?= site_url('dashboard/view_guru'); ?>">Lihat Guru</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope-o"></i>Pesan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= site_url('dashboard/view_pesan'); ?>">Kotak Masuk</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
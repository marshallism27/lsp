<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Perpustakaan</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="home.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="home.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <a href="peminjaman.php">
          <i class='bx bx-collection' ></i>
          <span class="link_name">Peminjaman</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="peminjaman.php">Peminjaman</a></li>
        </ul>
      </li>
      <li>
        <a href="pengembalian.php">
          <i class='bx bx-book-alt' ></i>
          <span class="link_name">Pengembalian</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pengembalian.php">Pengembalian</a></li>
        </ul>
      </li>
      <li>
        <a href="pesan.php">
          <i class='bx bx-message-alt' ></i>
          <span class="link_name">Pesan</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="pesan.php">Pesan</a></li>
        </ul>
      </li>
      <li>
        <a href="profil.php">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Profil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="profil.php">Profil</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name"><?= $data_user["fullname"] ?></div>
        <div class="job"><?= $data_user["kelas"] ?></div>
      </div>
      <a href="http://localhost/library/logout.php"><i class='bx bx-log-out'></i></a>
    </div>
  </li>
</ul>
  </div>
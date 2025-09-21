<div class="pagetitle">
  <h1>Welcome Admin!</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Blank</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Selamat Datang,
            <?php 
            // supaya tidak warning kalau $_SESSION['username'] belum ada
            echo htmlspecialchars($_SESSION['username'] ?? 'Pengguna');
            ?> 👋
          </h5>
          <p>Detail Admin : </p>
          <ul>
            <li>Nama Panjang : <?= htmlspecialchars($_SESSION['name'] ?? '-') ?></li>
            <li>NIM : <?= htmlspecialchars($_SESSION['nim'] ?? '-') ?></li>
            <li>Jurusan : <?= htmlspecialchars($_SESSION['jurusan'] ?? '-') ?></li>
            <li>Prodi : <?= htmlspecialchars($_SESSION['prodi'] ?? '-') ?></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Example Card</h5>
          <p>This is an example page with no content. You can use it as a starter for your custom pages.</p>
        </div>
      </div>
    </div>
  </div> -->
</section>

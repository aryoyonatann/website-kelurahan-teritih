<footer class="app-footer">
    <div class="container-fluid px-4">
        <div class="row g-4 pt-4 pb-3">

            <!-- Brand -->
            <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="footer-logo"><i class="bi bi-geo-alt-fill"></i></div>
                    <span class="footer-brand-name">Kelurahan Teritih</span>
                </div>
                <p class="footer-desc">
                    Mewujudkan tata kelola pemerintahan yang baik, bersih, dan melayani masyarakat dengan sepenuh hati.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="footer-social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-social"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-social"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- Tautan Internal -->
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading">Tautan Internal</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-chevron-right"></i> Dashboard</a></li>
                    <li><a href="{{ route('permohonan.index') }}"><i class="bi bi-chevron-right"></i> Permohonan Surat</a></li>
                    <li><a href="{{ route('jenis-surat.index') }}"><i class="bi bi-chevron-right"></i> Jenis Surat</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right"></i> Kependudukan</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right"></i> Helpdesk / IT</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-heading">Kontak &amp; Dukungan</h6>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt-fill text-primary"></i>
                        <span>Jl. Raya Teritih No. 123, Kota Serang, Banten 42119</span>
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill text-primary"></i>
                        <span>(0254) 123-456 / 789 | 1970</span>
                    </li>
                    <li>
                        <i class="bi bi-envelope-fill text-primary"></i>
                        <span>support@kelurahan-teritih.go.id</span>
                    </li>
                </ul>
            </div>

            <!-- Peta -->
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-heading">Lokasi Kantor</h6>
                <div class="footer-map rounded overflow-hidden border border-secondary border-opacity-25">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.25!2d106.1543!3d-6.1227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418a2a78a50e07%3A0x74c78c4f5c5eed87!2sSerang%2C%20Kota%20Serang%2C%20Banten!5e0!3m2!1sen!2sid!4v1700000000000"
                        width="100%" height="120" style="border:0" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>

        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span>© {{ date('Y') }} Kelurahan Teritih. Hak Cipta Dilindungi.</span>
            <span>Sistem Informasi Pelayanan Publik v2.0</span>
        </div>
    </div>
</footer>
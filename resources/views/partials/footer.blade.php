<style>
/* =====================================================
   FOOTER — shared partial styles
===================================================== */
.main-footer { background: #0f172a; padding: 48px 32px 0; flex-shrink: 0; }

.footer-brand-icon {
    width: 36px; height: 36px; background: #1c64f2;
    border-radius: 8px; display: flex;
    align-items: center; justify-content: center;
    color: white; font-size: 18px; flex-shrink: 0;
}
.footer-brand-name { font-size: 15px; font-weight: 800; color: white; line-height: 1.2; }
.footer-brand-sub  { font-size: 10px; color: #64748b; text-transform: uppercase; letter-spacing: .05em; }
.footer-desc       { font-size: 12.5px; color: #94a3b8; line-height: 1.75; margin: 10px 0 16px; }

.footer-social {
    width: 32px; height: 32px; background: #1e293b;
    border-radius: 7px; display: inline-flex;
    align-items: center; justify-content: center;
    color: #94a3b8; text-decoration: none;
    font-size: 15px; transition: all .18s;
}
.footer-social:hover { background: #1c64f2; color: white; }

.footer-heading {
    font-size: 12px; font-weight: 700; color: #cbd5e1;
    text-transform: uppercase; letter-spacing: .08em; margin-bottom: 16px;
}

.footer-links        { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 9px; }
.footer-links a      { color: #94a3b8; text-decoration: none; font-size: 13px; transition: color .18s; }
.footer-links a:hover{ color: #60a5fa; }

.footer-contact      { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
.footer-contact li   { display: flex; gap: 10px; font-size: 12.5px; color: #94a3b8; align-items: flex-start; }
.footer-contact li i { color: #60a5fa; flex-shrink: 0; margin-top: 2px; }

.footer-map { border-radius: 10px; overflow: hidden; border: 1px solid #1e293b; }

.footer-bottom {
    border-top: 1px solid #1e293b; padding: 16px 0; margin-top: 32px;
    display: flex; justify-content: space-between; align-items: center;
    flex-wrap: wrap; gap: 10px; font-size: 12px; color: #475569;
}
.footer-bottom-links { display: flex; gap: 20px; }
.footer-bottom-links a { color: #64748b; text-decoration: none; transition: color .18s; }
.footer-bottom-links a:hover { color: #94a3b8; }

@media (max-width: 991px) {
    .main-footer { padding: 36px 16px 0; }
}
</style>

<footer class="main-footer">
    <div class="row g-4">

        <!-- Brand -->
        <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center gap-2 mb-1">
                <div class="footer-brand-icon"><i class="bi bi-bank2"></i></div>
                <div>
                    <div class="footer-brand-name">Kelurahan Teritih</div>
                    <div class="footer-brand-sub">Kota Serang</div>
                </div>
            </div>
            <p class="footer-desc">
                Mewujudkan tata kelola pemerintahan yang baik, bersih, dan melayani masyarakat dengan sepenuh hati.
            </p>
            <div class="d-flex gap-2">
                <a href="#" class="footer-social"><i class="bi bi-globe2"></i></a>
                <a href="#" class="footer-social"><i class="bi bi-envelope-fill"></i></a>
                <a href="#" class="footer-social"><i class="bi bi-telephone-fill"></i></a>
            </div>
        </div>

        <!-- Tautan Cepat -->
        <div class="col-lg-2 col-md-6">
            <div class="footer-heading">Tautan Cepat</div>
            <ul class="footer-links">
                <li><a href="#">Profil Kelurahan</a></li>
                <li><a href="#">Struktur Organisasi</a></li>
                <li><a href="#">Layanan Online</a></li>
                <li><a href="#">Transparansi Anggaran</a></li>
                <li><a href="#">Peta Wilayah</a></li>
            </ul>
        </div>

        <!-- Kontak -->
        <div class="col-lg-4 col-md-6">
            <div class="footer-heading">Kontak Kami</div>
            <ul class="footer-contact">
                <li>
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Jl. Raya Teritih No. 123, Kecamatan Walantaka, Kota Serang, Banten 42183</span>
                </li>
                <li>
                    <i class="bi bi-telephone-fill"></i>
                    <span>(0254) 123456</span>
                </li>
                <li>
                    <i class="bi bi-envelope-fill"></i>
                    <span>admin@teritih.go.id</span>
                </li>
                <li>
                    <i class="bi bi-clock-fill"></i>
                    <span>Senin–Jumat: 08.00–16.00</span>
                </li>
            </ul>
        </div>

        <!-- Peta -->
        <div class="col-lg-3 col-md-6">
            <div class="footer-heading">Lokasi Kantor</div>
            <div class="footer-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.25!2d106.1543!3d-6.1227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418a2a78a50e07%3A0x74c78c4f5c5eed87!2sSerang%2C%20Kota%20Serang%2C%20Banten!5e0!3m2!1sen!2sid!4v1700000000000"
                    width="100%" height="140" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <span>© {{ date('Y') }} Kelurahan Teritih, Kota Serang. Hak Cipta Dilindungi.</span>
        <div class="footer-bottom-links">
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat &amp; Ketentuan</a>
            <a href="#">Peta Situs</a>
        </div>
    </div>
</footer>
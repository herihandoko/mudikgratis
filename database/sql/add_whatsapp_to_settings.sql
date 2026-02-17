-- Tambah kolom WhatsApp ke tabel settings
-- Jalankan script ini jika tidak memakai Laravel migration (php artisan migrate)

ALTER TABLE `settings`
    ADD COLUMN `whatsapp_token` VARCHAR(255) NULL AFTER `preloader_style`,
    ADD COLUMN `whatsapp_base_url` VARCHAR(255) NULL AFTER `whatsapp_token`;
